<?php
/* Connect To Database*/
	require_once ("../inicio.php");

$id_vendedor=23;
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	
	$tables="productos";
	$campos="*";
	$sWhere=" id_vendedor =".$id_vendedor; 

/*	$sWhere=" estado <> false and principal <> false";
	$sWhere.=" order by productos.id DESC";*/  //utilizar para pantalla principal
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = 10;//intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	/*Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tbody>	
						<?php 
						$finales=0;
						$fila = 0;
						
						while($row = mysqli_fetch_array($query)){	
							$fila++;
							$id =  $row['id'];
							$imagen =  $row['imagen'];
							$finales++;
							//Datos de productos
							$nombre =  $row['nombre'];
							$id_vendedor =  $row['id_vendedor'];
							$descripcion =  utf8_encode($row['descripcion']);
							$precio_rebajado =  $row['precio_rebajado'];
							$precio =  $row['precio'];
							$estado =  $row['estado'];


							//echo $con,"SELECT $campos3 FROM  $tables3 where $sWhere3";
							//exit;					
						
						?>	
						<tr class="<?php echo $text_class;?>" style="width:100%;">
							<td><h6><?php echo $id;?></h6></td>
							<td><img class="img-fluid mx-auto d-block responsive-img" title="<?php echo $id;?>" src='<?php echo $imagen;?>' width="325" height="150" /></td>
							<td style="FONT-SIZE:12px;width=150px;"><?php echo "Precio<br>".$precio;?></td>
							<td colspan=3><?php echo $descripcion;?></td>
							<td style="FONT-SIZE:12px;width=150px;"><?php echo "Estado<br>".$estado;?></td>
							<td colspan=2>
							<input type="text" placeholder="N° C.I."  id="ci" />
                                			<button class="btn btn-info" type="button" onclick="">
                                			<span class="glyphicon glyphicon-list-alt" ></span>
                            				</button>
							</td>
						</tr>
						<tr>
							<td style="width:100px;FONT-SIZE:9px;">
							</td>
							<td style="width:120px;FONT-SIZE:9px;" >
							</td>
					
						<!-- Areas y Cargos  -->
						<td style="width:120px;FONT-SIZE:9px;">	
						</td>
					<!-- documentos  -->
						<td style="width:250px;FONT-SIZE:9px; LINE-HEIGHT:15px;">

												</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	
	<?php	
	}	
}
//mysql_close($con);
?>          
		  
<>