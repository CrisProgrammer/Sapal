<?php

//header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure"); 
/* Connect To Database*/
	require_once ("../inicio.php");

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax')
{
/*	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
*/
	$campos="p.id as id, p.nombre as nombre, e.empresa as empresa, p.ubicacion as ubicacion";
	$tables="im_productos p, im_lineas e";
	$sWhere="(p.id_linea=e.id_linea) and (p.estado<>false)";
	$sWhere.=" order by p.id DESC";


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
				<?php
				$finales=0;
				$fila = 0;
				while($row = mysqli_fetch_array($query)){
				$fila++;
				$id =  $row['id'];
				$nombre =  $row['nombre'];
				$empresa =  $row['empresa'];
				$ubicacion =  $row['ubicacion'];
				$finales++;
				//Datos de productos
			?>

							<div class="col-lg-2 col-ms-2 topico02" style="position: relative; float: left; height: auto; overflow: hidden; margin: 10px 0px 10px 0px;">
							<h6 class="producto"><b><?php echo $nombre;?></b></h6></br>
						<p class="empresa" style="font-size:10px; text-transform: uppercase; line-height: 0px; margin: 0 auto;"><?php echo $empresa;?>  </p></br>
						<div style="float:center; margin: 10px 10px; width: 100%; display: flex;  align-items: center;  justify-content: center;">
							<a type="button" class="botones btn-lg d-block mx-auto agregar-carrito" data-target="<?php echo $ubicacion;?>">Ver más...</a> </br>
						</div>
						<div style="float:center; margin: 10px 10px; width: 100%; display: flex;  align-items: center;  justify-content: center;">
						</div>
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
    <!-- Animación -->
    <script src="js/anim.js"></script>
