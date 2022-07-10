<?php

include "../inicio.php";

$idconvocatoria=null;
$sql1= "select * from convocatoria order by idconvocatoria desc";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Número de convocatoria</th>
	<th>Descripción</th>
	<th>Fecha de registro</th>
	<th>Fecha de inicio</th>
	<th>Fecha de fin</th>
	<th>Estado</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["numeroconvocatoria"]; ?></td>
	<td><?php echo utf8_encode($r["descripcion"]); ?></td>
	<td><?php echo $r["fecharegistro"]; ?></td>
	<td><?php echo $r["fechainicio"]; ?></td>
	<td><?php echo $r["fechafin"]; ?></td>
	<td><?php if($r["estado"]=="A"){echo "Activa";}
	elseif($r["estado"]=="I"){echo "Inactiva";}
	else{echo "Anulada";} ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["idconvocatoria"];?>" class="btn btn-edit">Editar</a>
		<a href="#" id="del-<?php echo $r["idconvocatoria"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<a data-id="distritos+<?php echo $r["idconvocatoria"];?>" class="btn btn-sm btn-warning">Distritos</a>
		<script>
		$("#del-"+<?php echo $r["idconvocatoria"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){

				$.get("php/eliminar.php","idconvocatoria="+<?php echo $r["idconvocatoria"];?>,function(data){
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


  <script>
  	$(".btn-sm").click(function(){
  		id = $(this).data("id");
  		$.get("php/distritos.php","id="+id,function(data){
  			$("#form-sm").html(data);
  		});
  		$('#distritosModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="distritosModal" tabindex="-1" role="dialog" aria-labelledby="distritosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Distritos</h4>
        </div>
        <div class="modal-body">
        <div id="form-distritos"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->