<?php
if(!empty($_GET)){
			include "../inicio.php";
			
			$sql = "DELETE FROM convocatoria WHERE idconvocatoria=".$_GET["idconvocatoria"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../crud.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../crud.php';</script>";

			}
}

?>