<?php
require_once ('../inicio.php');
error_reporting(0);
session_start();
$varsession=$_SESSION['usuario'];
if($varsession==null||$varsession=''){
  echo "No tiene permiso para ver esta página";
  die();
  
}
$id=$_GET["id"];

?>
<html>
	<head>
		<title>.: DOCUMENTOS :.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <meta name="description" content="Descargas">
    <link rel="" href="css/style.css">
    <link rel="stylesheet" href="../css/app.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen,projection" />
    <link href="../css/materialize.css" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="icon" type="image/gif" href="../images/Favico.gif"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">
	</head>
	<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php 
$sql1= "select * from poductos where id=".$id;
  $query=$con->query($sql1);
if($query->num_rows>0){
  $r=$query->fetch_array();
  $descripcion = $r['descripcion'];
  $id = $r['id'];}  ?>
		<h3>VER DOCUMENTOS</h3><br>
    <h4><?php echo $id.": ".$producto;?></h4>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar</a>
  <a href="cerrarsession.php" class="btn btn-default">Salir</a>
    
</form>

<br>
  <!-- Modal agregar-->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
        <form action="agregardocumento.php" autocomplete="off" enctype="multipart/form-data" method="post" id="agregardocumento">
<div class="form-group">
    <input type="hidden" value="<?php echo $idconvocatoria;?>" name="idconvocatoria">
    <label for="titulo" >Descripción documento</label>
    <input type="text" class="form-control" name="titulo" value="" placeholder="Este texto aparecerá como ayuda en la descarga" required>
  </div>
  <div class="grid-x grid-padding-x">
    <input type="checkbox" id="reutilizable" value='off' name="reutilizable"><label for="reutilizable"> Reutilizable</label><br>
  </div>
  <div class="grupo-documental">
  <br>
  <label for="grupodocumental">Grupo documental:
    <select class="browser-default" name="grupodocumental">
        <?php
          $querygd = mysqli_query($con,"SELECT * FROM grupodocumental order by grupodocumental");
          while ($valores = mysqli_fetch_array($querygd)) {
            echo '<option value="'.$valores[0].'" >'.utf8_encode($valores[1]).'</option>';
          }
        ?>
            <option value="0" selected>Seleccione:</option>

    </select> </label>
  </div>
  <br>
  <div class="archivo">
  <label for="archivo">Archivo <span><em>*</em></span></label><br>
      <input type="file" name="archivo" id="archivo"  accept="application/pdf, application/rar, application/zip"/>
      <br><br>
  </div>
  <div class="group-documental">
  <label for="fechapublicacion">Fecha de publicación <span><em>*</em></span></label><br>
  <input type="date" name="fechapublicacion" class="form-input" required maxlength="100" size="40" placeholder="dd/mm/aa" required/>
					<br>
  <label for="fechadespublicacion">Fecha de despublicación <span></span></label><br>
  <input type="date" name="fechadespublicacion" class="form-input" maxlength="100" size="40" placeholder="dd/mm/aa" required/>
					<br>
  </div>
  <div class="form-group">
    <label for="observacion" >Observaciones</label>
    <input type="text" class="form-control" name="observacion" value="" placeholder="Este dato no se muestra y está en la BD para ayuda de administracion">
  </div>
  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./tabladocumentos.php?id=<?php echo $idconvocatoria;?>",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("http://localhost/descargas/php/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("http://localhost/descargas/php/agregar.php",$("#agregar").serialize(),function(data){
    });
    alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>