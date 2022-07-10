<?php
include "../inicio.php";
$idconvocatoria=$_GET['id'];
$sqld= "select idarea,area,if(isnull(numero),0,numero) as nu
from areaprofesional as ap
LEFT JOIN areaconvocatoria as b on b.idareaprofesional=ap.idarea and b.idconvocatoria=".$idconvocatoria." 
order by area";
$queryd = $con->query($sqld);
?>

<form role="form" class="form-horizontal" id="actualizar" action="POST">	
<?php 
      while($row = mysqli_fetch_array($queryd)){	
      $idarea = $row['idarea'];
      $area = utf8_encode($row['area']);
      $numero = $row['nu'];
      ?>
  <div class="form-group">
  <label for="area" ><?php echo $area;?>
  </label>
  <div class="col-lg-3">
      <input type="numeric" class="form-control" value="<?php echo $numero;?>" name="<?php echo $idarea;?>" id="<?php echo $idarea;?>"  required>
      </div>  
  </div>
<?php }?>
  <!--Hasta aqui seleccionamos distritos-->
<input type="hidden" name="idconvocatoria" value="<?php echo $idconvocatoria; ?>">
  <button type="submit" class="btn btn-default">Actualizar cargos vacantes</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    alert ("hehehe");
    $.post("php/actualizarareavacante.php",$("#actualizar").serialize());
});
</script>
