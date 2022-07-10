<?php
if(!empty($_POST)){
	if(isset($_POST["numeroconvocatoria"]) &&isset($_POST["descripcion"]) &&isset($_POST["fechainicio"]) &&isset($_POST["fechafin"]) &&isset($_POST["estado"])){
		if($_POST["numeroconvocatoria"]!=""&& $_POST["descripcion"]!=""){
			include "../inicio.php";
			
			$sql = "update convocatoria set numeroconvocatoria=\"$_POST[numeroconvocatoria]\",descripcion=\"$_POST[descripcion]\",fechainicio=\"$_POST[fechainicio]\",fechainicio=\"$_POST[fechainicio]\",fechafin=\"$_POST[fechafin]\",estado=\"$_POST[estado]\" where idconvocatoria=".$_POST["idconvocatoria"];
			$query = $con->query($sql);
//guarda distritos			
			if(isset($_POST['chuquisaca'])){ //no existe en bd y esta tickeado
				$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=1";
				$query2=$con->query($sql2);
				if($query2->num_rows==0){
				$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 1)");
				}
			}
			else{ //existe y esta destickeado
				$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=1";
				$eliminadistrito=$con->query($eliminasql);
		//		mysql_free_result($eliminadistrito);
			}		
//2
			if(isset($_POST['lapaz'])){ //no existe en bd y esta tickeado
				$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=2";
				$query2=$con->query($sql2);
				if($query2->num_rows==0){
				$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 2)");
				}
			}
			else{ //existe y esta destickeado
				$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=2";
				$eliminadistrito=$con->query($eliminasql);
		//		mysql_free_result($eliminadistrito);
			}		
//3
if(isset($_POST['santacruz'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=3";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 3)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=3";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//4
if(isset($_POST['cochabamba'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=4";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 4)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=4";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//5
if(isset($_POST['potosi'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=5";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 5)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=5";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//6
if(isset($_POST['oruro'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=6";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 6)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=6";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//7
if(isset($_POST['pando'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=7";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 7)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=7";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//8
if(isset($_POST['tarija'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=8";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 8)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=8";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//9
if(isset($_POST['beni'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=9";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 9)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=9";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		
//10
if(isset($_POST['nacional'])){ //no existe en bd y esta tickeado
	$sql2="select * from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=10";
	$query2=$con->query($sql2);
	if($query2->num_rows==0){
	$insertadistrito=$con->query("insert into convocatoriadistrito (idconvocatoria,iddistrito) values (\"$_POST[idconvocatoria]\", 10)");
	}
}
else{ //existe y esta destickeado
	$eliminasql="delete from convocatoriadistrito where idconvocatoria=\"$_POST[idconvocatoria]\" and iddistrito=10";
	$eliminadistrito=$con->query($eliminasql);
//		mysql_free_result($eliminadistrito);
}		

if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../crud.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../crud.php';</script>";

}
		}
	}
}
?>