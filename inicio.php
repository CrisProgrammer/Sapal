<?php

	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','importadora_medicamentos');
	# conectare la base de datos
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Conexion fallo: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

    

?>