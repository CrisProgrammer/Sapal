<?php

include "../inicio.php";

$idconvocatoria=$_GET["id"];
$sql1= "Select d.*, gd.grupodocumental, dc.idconvocatoria
from documento as d
inner join documentoconvocatoria as dc on d.iddocumento=dc.iddocumento
inner join convocatoria as c on c.idconvocatoria=dc.idconvocatoria
inner join grupodocumental as gd on gd.idgrupodocumental=d.idgrupodocumental
where c.idconvocatoria=".$idconvocatoria;
$query = $con->query($sql1);
 if($query->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Título</th>
	<th>Grupo documental</th>
	<th>Reutilizable</th>
	<th>Archivo</th>
	<th></th>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><?php echo $r["titulo"]; ?></td>
	<td><?php echo utf8_encode($r["grupodocumental"]); ?></td>
	<td><?php if($r["reutilizable"]==1)echo "Reutilizable"; else echo"No reutilizable"; ?></td>
	<td><?php echo $r["archivo"]; ?></td>
	<td style="width:150px;">

		<a data-id="<?php echo $r["iddocumento"];?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar">edit</i></a>
		
		<a href="#" id="del-<?php echo $r["iddocumento"];?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">delete</i></a>
		<script>
		$("#del-"+<?php echo $r["iddocumento"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("../php/eliminardocumento.php",{iddocumento:"<?php echo $r["iddocumento"];?>",idconvocatoria:"<?php echo $r["idconvocatoria"];?>"},function(data){
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
  <!-- Modal editar -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("php/editardocumentos.php","id="+id,function(data){
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

      </div ><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->