<?php
if(!empty($_GET)){
			include "../inicio.php";
			
			$sql = "DELETE FROM documentoconvocatoria WHERE idconvocatoria=".$_GET["idconvocatoria"]." and iddocumento=".$_GET["iddocumento"];
			//hay que eliminar el archivo fisico si correcponde
		//	echo $sql;
		//	exit;
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='documentos.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='documentos.php';</script>";

			}
}

?>