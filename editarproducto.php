<?php
if(isset($_POST['username'])) $user1 = $_POST['username'];else $user1="";
if(isset($_POST['password'])) $pass1 = $_POST['password'];else $pass1="";

    session_start();
    if (!isset($_SESSION['usuario'])) {
        if($user1=="administrador"&&$pass1=="123321"){
            $_SESSION["usuario"] = "admin1";
        }
        else
        {
        header('location: login.php');
        }
    };
    require_once("inicio.php");
    $sqllineas = "SELECT * from im_lineas ORDER BY empresa";
    $res = $con->query($sqllineas);
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
<body id="login_activo">
<header>
    <!-- Navbar  -->
    <script src="js/menu.js"></script>
    <?php include('menu.php'); ?>
</header>  
    <div class="desplazador">
        <a><img src="img/tipos/whas.png" class="whas"></a>
    </div>
    <div class="titulos" >
        <h4>Registro de productos</h4>
        <div class="col-lg-6 col-sm-12 parallax04" id="iconos2"> </div>
    </div>
    <div class="row linkening">
        <div class="col-lg-6 col-sm-12 left"><a href="index.php">Efectiv Pharma / Login / </a><span> Registro de productos  </span></div>
        <div class="col-lg-6 col-sm-12 right" > <a href="index.php"><< Cerrar sesión</a></div>
    </div>
    <div class="row">
            <div class="topicos col-lg-12">
                <div class="col-lg-6 offset-lg-3 col-sm-12 descripcion">
                    <form action="php/guardarproducto.php" method="post">
                    <h2>Registro de productos</h2>
                        <br>

                        <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" required ></label><br>
                        <label for="accion">Acción terapéutica: <input type="text" name="accion" id="accion" required></label><br>
                        <label for="ubicacion">Ubicación (URL): <input type="url" name="ubicacion" id="ubicacion"></label><br>
                        <label for="linea">Línea: <select name="linea" id="linea">
                            <option value="0">Seleccione una línea</option>
                            <?php
                            while($row = mysqli_fetch_assoc($res)){
                                $idlinea = $row['id_linea'];
                                $empresa = $row['empresa'];
                                echo '<option value="'.$idlinea.'">'.$empresa.'</option>';
                            }
                            ?>
                        </select></label>
                        <br><br>
                        <input type="submit" class="botones" value="Guardar">    <a href="logout.php"><input type="button" class="botones" value="Salir"></a>

                    </form>
                </div>
            </div>
    </div>


    <?php include('pag_final.php'); ?>
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>