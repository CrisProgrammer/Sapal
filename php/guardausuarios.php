<?php
require_once ("../inicio.php");
require_once ("seguridad.php");
if(!empty($_POST)){
	if(isset($_POST["usuario"]) &&isset($_POST["clave"]) &&isset($_POST["clave2"])){
        if($_POST["clave"]==$_POST["clave2"]){
            $claveE=SED::encryption($_POST["clave"]);
			$sql = "insert into usuarios (usuario,contrasena) value (\"$_POST[usuario]\",\"$claveE\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Usuario Agregado exitosamente.\");window.location='../crud.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar al usuario, ingrese los datos nuevamente.\");window.location='../crud.php';</script>";
        	    }
            }   
            else{
                print "<script>alert(\"La contraseña y la repetición no coinciden.\");
                window.location='../usuarios.php';</script>";
            }
    }
}
?>