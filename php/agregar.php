<?php
if(!empty($_POST)){
//	if(isset($_POST["numeroconvocatoria"]) &&isset($_POST["descripcion"]) &&isset($_POST["fechainicio"]) &&isset($_POST["fechafin"]) &&isset($_POST["estado"])){
//		if($_POST["numeroconvocatoria"]!=""&& $_POST["descripcion"]!=""){
			include "../inicio.php";
			
				$sql = "insert into convocatoria (numeroconvocatoria,descripcion,fechainicio,fechafin,estado,fecharegistro) value (\"$_POST[numeroconvocatoria]\",\"$_POST[descripcion]\",\"$_POST[fechainicio]\",\"$_POST[fechafin]\",\"$_POST[estado]\",NOW())";
				//$sql = "insert into convocatoria (numeroconvocatoria,descripcion,fechainicio,fechafin,estado,fecharegistro) values ('asd','dfg',NOW(),NOW(),NOW())";
				$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../crud.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../crud.php';</script>";

//			}
//		}
	}
}



?>