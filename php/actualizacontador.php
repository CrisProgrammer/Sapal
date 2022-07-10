<?php
include "../inicio.php";
$con->query("update documentoconvocatoria set descargas=descargas+1 where idconvocatoria=".$_GET['idconvocatoria']." and iddocumento=".$_GET['iddocumento']);
?>