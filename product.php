<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos - SAPAL</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <!-- Menú -->
    <link rel="stylesheet" href="css/style_menu.css">
    <link rel="stylesheet" href="css/style_font.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script> 
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main1.js"></script>
    <!-- general -->
    <link rel="stylesheet" href="css/style.css">     <!-- Bootstrap CSS -->
</head>
<body id="product">
    <header>
        <!-- Navbar  -->
        <script src="js/menu.js"></script>
        <?php include('menu.php'); ?>
    </header>  
    <div class="desplazador">
        <a><img src="img/tipos/whas.png" width="100px" alt="" style="cursor: pointer;"></a>
    </div>
    <div class="row products">
        <div class="col-lg-12 img_div" id="mover_img_div">
            <div class="row">
                <div class="col-lg-6 offset-lg-6"><h2>Productos</h2><br>
                <h5>Contamos con un equipo eficiente con procesos estratégicos para dar a nuestros clientes el mejor servivio.</h5>
            </div>
                <div class="col-lg-6 offset-lg-6"><img src="img/productos_farm.jpg" alt=""></div>
            </div>
        </div>
        <div class="col-lg-12 topicos"> 
            <div class="col-lg-4">Producto 1</div>
            <div class="col-lg-4">Producto 2</div>
            <div class="col-lg-4">Producto 3</div>
        </div>  

    </div>


    <?php include('pag_final.php'); ?>


    <script src="js/scriptmostrarproductos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Menú -->
    <script src="js/main.js"> </script>
    <script src="js/anim3.js"></script>
</body>

</html>