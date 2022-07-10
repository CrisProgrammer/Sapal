<?php
    require_once("inicio.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - EFECTIV FHARMA</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<!-- Menú -->
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="css/style_font.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script> 
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main1.js"></script>
<!--     General -->
    <link rel="stylesheet" href="css/style.css">     <!-- Bootstrap CSS -->
</head>
<body id="login">
<header>
    <!-- Navbar  -->
    <script src="js/menu.js"></script>
    <?php include('menu.php'); ?>
</header>  
    <div class="desplazador">
        <a><img src="img/tipos/whas.png" class="whas"></a>
    </div>
    <div class="titulos" >
        <h4>Login</h4>
        <div class="col-lg-6 col-sm-12 parallax04" id="iconos2"> </div>
    </div>
    <div class="row linkening">
        <div class="col-lg-6 col-sm-12 left"><a href="index.php">Efectiv Pharma / </a><span> Login </span></div>
        <div class="col-lg-6 col-sm-12 right" > <a href="index.php"><< Retornar a inicio</a></div>
    </div>
    <div class="row">
            <div class="topicos col-lg-12">
                <div class="col-lg-6 offset-lg-3 col-sm-12 descripcion">
                    <form action="editarproducto.php" method="POST">
                    <h2>Control de acceso</h2>
                        <br>
                        <div class="form">
                            <div class="item"> <!-- parte de nombre de usuario -->
                                <label for="">Usuario:</label>
                                <i></i> <!-- Se utilizará para dibujar el icono delante del nombre de usuario-->
                                <input type="text" placeholder="username" name="username"> <!-- Entrada de nombre de usuario realizada por cuadro de texto-->
                            </div>
                            <div class="item"> <!-- parte de la contraseña -->
                                <label for="">Passwrod: </label>
                                <i></i> <!-- Se utilizará para dibujar el icono delante de la contraseña en el futuro-->
                                <input type="password" placeholder="password" name="password"> <!-- Entrada de contraseña usando el cuadro de texto de contraseña -->
                            </div>
                        </div><br>
                        <button class="botones" type="submit">Acceder</button> <!-- Botón de inicio de sesión implementado con el botón -->
                    </form>
            </div>
        </div>
    </div>
 

    <?php include('pag_final.php'); ?>
    <script src="js/bootstrap.min.js"></script>
    <!-- Menú -->
        <script src="js/app.js"></script>
    <!-- Animación -->
    <script src="js/anim.js"></script>

</body>
</html>