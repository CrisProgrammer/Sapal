<?php
$elementos=count($_POST);
$idconvocatoria=$_POST['idconvocatoria'];
//$idconvocatoria=75;
include "../inicio.php";
    //sacar cual es el idareaprofesional
    $sqld= "select idarea,area
    from areaprofesional as ap order by area";
    $resultado=$con->query($sqld);
    $eliminar=$con->query("DELETE from areaconvocatoria where idconvocatoria=".$idconvocatoria);
    for($i=1;$i>$elemento;$i++){
        if($_POST["$i"]>0){
            $numero=$_POST["$i"];   
        $sql="INSERT INTO areaconvocatoria SET numero =".$numero.", idconvocatoria = ".$idconvocatoria.", idareaprofesional = ".$i." ON DUPLICATE KEY UPDATE numero = ".$numero;
        $actualizado=$con->query($sql);
   } 
}
?>