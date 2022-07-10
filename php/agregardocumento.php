<?php

if(!empty($_POST)){
//	if(isset($_POST["numeroconvocatoria"]) &&isset($_POST["descripcion"]) &&isset($_POST["fechainicio"]) &&isset($_POST["fechafin"]) &&isset($_POST["estado"])){
//		echo "el post manda numeroconvocatoria,descripcion,fechainicio,fechafin y estado";
//		exit;
//		if($_POST["numeroconvocatoria"]!=""&& $_POST["descripcion"]!=""){
			include "../inicio.php";
			$titulo=utf8_encode($_POST['titulo']);
			$idconvocatoria=$_POST['idconvocatoria'];
			$archivo = $_FILES['archivo']['name'];//archivo a cargar*
			$tipostring= $_FILES['archivo']['type'];
			$tamano_archivo = $_FILES["archivo"]['size'];
			$direccion_temporal = $_FILES['archivo']['tmp_name'];
			$actualizado=0;//al crearse no esta actualizado
			if(!isset($_POST['reutilizable']))
			$reutilizable=0;
			else $reutilizable=1;
//			echo $reutilizable;
//exit;
			$idgrupodocumental=$_POST['grupodocumental'];
			$cadena=substr($archivo,-3);
			$sqltipo="Select * from tipo where tipo=\"$cadena\"";
			$resultado0=$con->query($sqltipo);
			$tipos= mysqli_fetch_array($resultado0);
			$tipo=$tipos['idtipo'];
			$sql = "insert into documento (titulo,tipo,actualizado,fecharegistro,reutilizable,archivo,idgrupodocumental) value (\"$titulo\",\"$tipo\",NOW(),NOW(),".$reutilizable.",\"$archivo\",$idgrupodocumental)";
			$query = $con->query($sql);
//echo $sql;exit;
			$iddocumento =mysqli_insert_id($con);//ultimo insertado
			$idcategoria = $idgrupodocumental;//grupodocumental
			$fechapublicacion = $_POST['fechapublicacion'];
			$fechadespublicacion = $_POST['fechadespublicacion'];
			if(!isset($fechadespublicacion)){$fechadespublicacion = "2100-12-31"; 
				if($fechapublicacion>getdate())$publicado=0; else $publicado=1;}
				else{
				if($fechapublicacion>getdate()||$fechadespublicacion<getdate()) 
				$publicado = 0;
			else $publicado=1;}
			$fechaactualizacion =getdate();
			$mostraractualizado = 0;//no puede estar actualizado en el primer registro, solo si se hace update con algun cambio
			$descargas = 0;
			$observacion = $_POST['observacion'];

			$sql2 = "insert into documentoconvocatoria (iddocumento,idconvocatoria,idcategoria,fechaenlace,publicado,fechapublicacion,fechadespublicacion,fechaactualizacion,mostraractualizado,descargas,observacion) value(\"$iddocumento\",\"$idconvocatoria\",\"$idcategoria\",NOW(),\"$publicado\",\"$fechapublicacion\",\"$fechadespublicacion\",NOW(),\"$mostraractualizado\",\"$descargas\",\"$observacion\")";
			$query2= $con->query($sql2);
			
	//identificamos donde va y subimos el documento
	//DESDE AQUI GUARDA EL DOCUMENTO 
	$archivos_permitidos = array("image/jpg","image/jpeg","image/bmp","application/pdf","application/rar","application/zip");
	$limite_kb_archivo = 10240;//10megas
	$sql3="select replace(numeroconvocatoria,'/','-') from convocatoria where idconvocatoria=".$idconvocatoria;
	$resultado=$con->query($sql3);
	$directorio = mysqli_fetch_array($resultado);
	if($reutilizable==0)
	$ruta ='../files/'.$directorio[0].'/';
	else
	$ruta ='../files/shared/';
	
	if($_FILES["archivo"]['error']>0){
		echo "error al cargar el archivo: ".$_FILES["archivo"]['error'];
	} else{
//    	if(in_array($tipostring,$archivos_permitidos) && $tamano_archivo<=$limite_kb_archivo*1024){
 //  	    if($tamano_archivo<=$limite_kb_archivo*1024){
        if(!file_exists($ruta)){
            mkdir($ruta);
        }
//        if(!file_exists($archivo)){
//            $resultado_archivo = @move_uploaded_file($direccion_temporal,$ruta.$archivo);
		//	echo "va a guardar el archivo:".$ruta.$archivo;
			//exit;
            $resultado_archivo = @move_uploaded_file($direccion_temporal,$ruta.$archivo);
            if(!$resultado_archivo){
                    echo "error al guardar el archivo...";
            }
 //       }
   // } else{
//echo "Error al guardar el archivo. El tipo o tamaño de archivo no es permitido.";
    }
//}// HASTA AQUI GUARDA EL DOCUMENTO 
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");;</script>";

			}
			
		}
	//}
	header("Location: documentos.php?id=".$idconvocatoria);  
//}
?>
<html>
