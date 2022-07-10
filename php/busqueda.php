<?php

include "../inicio.php";

$user_id=null;
$sql1= "select productos.*, if(estado=true) as estado
from productos
ORDER BY productos.id DESC";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Producto o Servicio: </th>
	<th>Descripción: </th>
	<th>Precio: </th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo utf8_encode($r["descripcion"]); ?></td>
	<td><?php echo $r["precio_rebajado"]; ?></td>
	<td><?php echo $r["Precio"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["id"];?>" class="btn btn-edit btn-sm btn-warning">Comprar</a> </br>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Compartir</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Compartir</a>
		<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Compartir</a>

		<script>
$("#del-"+<?php echo $r["id"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("php/eliminar.php","id="+<?php echo $r["id"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("php/formulario.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->