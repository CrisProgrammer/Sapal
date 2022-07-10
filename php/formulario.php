<?php
include "../inicio.php";

$user_id=null;
$sql1= "select * from convocatoria where idconvocatoria = ".$_GET["id"];
$querya = $con->query($sql1);
$convocatoria = null;
if($querya->num_rows>0){
while ($r=$querya->fetch_object()){
  $convocatoria=$r;
  break;
  }
}
$sqld= "select iddistrito from convocatoriadistrito where idconvocatoria = ".$_GET["id"];
$queryd = $con->query($sqld);
$chuquisaca=0;
$lapaz=0;
$santacruz=0;
$cochabamba=0;
$potosi=0;
$oruro=0;
$pando=0;
$tarija=0;
$beni=0;
$nacional=0;
if($queryd->num_rows>0){
  while ($r1=$queryd->fetch_object()){
    $valor=$r1->iddistrito;
    switch($valor){
      case 1:$chuquisaca=1;break;
      case 2:$lapaz=1;break;
      case 3:$santacruz=1;break;
      case 4:$cochabamba=1;break;
      case 5:$potosi=1;break;
      case 6:$oruro=1;break;
      case 7:$pando=1;break;
      case 8:$tarija=1;break;
      case 9:$beni=1;break;
      case 10:$nacional=1;break;}
     // break;
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
  <!-- para seleccionar distritos-->
  <div class="form-group">
  <!-- Default checked -->
  <label for="distritos">Distritos</label>
  <div class="custom-control custom-checkbox">

  <input name="instalacion_empresa" class="element checkbox" type="checkbox"  value="<?php echo $registroinstalacion['idinstalacion']; ?>" 
<?php echo (isset($registroinstalacion['idinstalacion']) && $registroinstalacion['idinstalacion'])?' checked="checked"':null; ?>/>

      <input type="checkbox" class="custom-control-input" id="chuquisaca"name="chuquisaca"  <?php if($chuquisaca==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="chuquisaca">Chuquisaca</label>
      <input type="checkbox" class="custom-control-input" id="lapaz" name="lapaz" <?php if($lapaz==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="lapaz">La Paz</label>
  
      <input type="checkbox" class="custom-control-input" id="santacruz" name="santacruz" <?php if($santacruz==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="santacruz">Santa Cruz</label>
      <input type="checkbox" class="custom-control-input" id="cochabamba"name="cochabamba" <?php if($cochabamba==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="cochabamba">Cochabamba</label>
  
      <input type="checkbox" class="custom-control-input" id="oruro" name="oruro" <?php if($oruro==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="oruro">Oruro</label>
      <input type="checkbox" class="custom-control-input" id="potosi" name="potosi" <?php if($potosi==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="potosi">Potosí</label>
  
      <input type="checkbox" class="custom-control-input" id="tarija" name="tarija" <?php if($tarija==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="tarija">Tarija</label>
      <input type="checkbox" class="custom-control-input" id="beni" name="beni" <?php if($beni==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="beni">Beni</label>
      <input type="checkbox" class="custom-control-input" id="pando" name="pando" <?php if($pando==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="pando">Pando</label>
  
      <input type="checkbox" class="custom-control-input" id="nacional"name="nacional" <?php if($nacional==1){echo "checked";}else{echo "";} ?>>
      <label class="custom-control-label" for="nacional">Nacional</label>
      </div>
  </div>  
  <!--Hasta aqui seleccionamos distritos-->
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
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>