<?php

//header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure"); 
/* Connect To Database*/
	require_once ("../inicio.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax')
{
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$campos="e.id as id, e.empresa as empresa, e.logo as logo, e.nit as nit, e.pais as pais, e.departamento as departamento, e.ciudad as ciudad, e.direccion as direccion, e.tamano as tamano";
	$tables="msdmp_productos p, msdmp_empresa e";
	$sWhere="(p.id_vendedor=e.idusuario) and (p.estado <> false) and (p.principal <> false)";
	$sWhere.=" order by e.empresa DESC";


	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = 10;//intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	/*Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query))
	{
	$numrows = $row['numrows'];
	}
	else
	{
	echo mysqli_error($con);
	}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	if ($numrows>0)
	{

	?>
		 <div container style="background-color:#fff;"> <!--  container -->

			<div>
			<?php
				$finales=0;
				$fila = 0;
				while($row = mysqli_fetch_array($query)){
				$fila++;
				$id =   $row['id'];
				$empresa =  $row['empresa'];
				$imagen =  $row['logo'];
				$finales++;
				//Datos empresa
				$nit =  $row['nit'];
				$pais =  $row['pais'];
				$departamento =  $row['departamento'];
				$ciudad =  $row['ciudad'];
				$direccion =  $row['direccion'];
				$tamano =  $row['tamano'];
			?>
				<div class="col-lg-12 col-ms-12" style="position: relative; float: left; height: auto; overflow: hidden; margin: 10px 0px 10px 0px;">
					<div class="col-lg-4 col-sm-5">
						<img class='images section-products img-fluid mx-auto d-block responsive-img' src= <?php echo "images/$imagen"?> width='200px' height='auto'></br>
						<div style="float:center; display: inline table; margin: 10px 10px 10px 10px;">
							<a class="btn boton" href="#!" role="button"><i class="material-icons">facebook</i></a>
							<a class="btn boton" href="#!" role="button"><i class="material-icons">tiktok</i></a>
							<a class="btn boton" href="#!" role="button;"><i class="material-icons" >whatsapp</i></a>
						</div>					
					</div>
					<div class="col-lg-3 col-sm-5">
						<h4 ><b><?php echo $empresa;?></b></h4>
						<p> <?php if ($tamano==="1") {echo "Startup";} else if ($tamano==="2") {echo "Unipersonal";} else if ($tamano==="3") {echo "Micro empresa";} else if ($tamano==="4") {echo "Pequeña empresa";} else if ($tamano==="5") {echo "Mediana empresa";} if ($tamano==="6") {echo "Gran empresa";}?></p>
						<p><?php echo "NIT:  $nit";?></p></br>

					</div>
					<div class="col-lg-3 col-sm-5">
						<p><?php if ($pais==="79") {echo "Pais: Bolivia";}?></p>
						<p><?php if ($departamento==="1004") {echo "Departamento: Chuquisaca";}?></p>
						<p><?php echo "Ciudad: $ciudad"?></p>
						<p><?php echo "Dirección: $direccion"?></p>
						<a type="button" class="u-full-width btn btn-warning" data-img="<?php echo $imagen?>" data-target="<?php echo $id;?>">Ver productos</a> 
					</div>
				</div>
				<div style="float:center; margin: 10px 10px; width: 100%; display: flex;  align-items: center;  justify-content: center;"></div>
				</div>
			<?php
			}
		}
		?>
	</div>  
<div style="float:center; display: inline table; width: 100%; padding: '20px 20px 20px 120px'; overflow: hidden;">
</br>
	<?php
				$inicios=$offset+1;
			
				$finales+=$inicios -1;
				echo "Mostrando $inicios al $finales de $numrows registros";
				echo paginate( $page, $total_pages, $adjacents);
			?>
</div>
<?php
}
	//mysql_close($con);
?>
