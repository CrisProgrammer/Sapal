<?php
include "../inicio.php";

$user_id=null;
$sql1= "select * from convocatoria where idconvocatoria = ".$_GET["id"];
$query = $con->query($sql1);
$convocatoria = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $convocatoria=$r;
  break;
}

  }
?>

<?php if($convocatoria!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="numeroconvocatoria">Número de convocatoria</label>
    <input type="text" class="form-control" value="<?php echo $convocatoria->numeroconvocatoria; ?>" name="numeroconvocatoria" required>
  </div>
  <div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" class="form-control" value="<?php echo $convocatoria->descripcion; ?>" name="descripcion" required>
  </div>
  <div class="form-group">
    <label for="fechainicio">Fecha de inicio</label>
    <input type="date" class="form-control" value="<?php echo  date("Y-m-d", strtotime($convocatoria->fechainicio)); ?>" name="fechainicio" required>
  </div>
  <div class="form-group">
    <label for="fechafin">Fecha de fin</label>
    <input type="text" class="form-control" value="<?php echo $convocatoria->fechafin; ?>" name="fechafin" >
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <select class="form-control" name="estado">
      <option value="A" <?php if($convocatoria->estado=="A"){echo "selected";}else{echo "";} ?>>Activa</option> 
      <option value="I" <?php if($convocatoria->estado=="I"){echo "selected";}else{echo "";} ?>>Inactiva</option>
      <option value="X" <?php if($convocatoria->estado=="X"){echo "selected";}else{echo "";} ?>>Anulada</option>
    </select> 
  </div>  
<input type="hidden" name="idconvocatoria" value="<?php echo $convocatoria->idconvocatoria; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();

    $.post("php/actualizar.php",$("#actualizar").serialize(),function(data){
    });

//    alert(document.getElementById("fechafin").value);
    //$("#actualizar")[0].reset();
    $('#distritosModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>