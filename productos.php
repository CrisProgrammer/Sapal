<?php
/* session_start();
if (isset($_SESSION['usuario'])) {
 $usuario  = $_POST['usuario'];
 $idusuario = $_POST['idusuario'];
 //header('location: login.php');
}
else{
$usuario='';
$idusuario=0;
}
 */require_once ("inicio.php");

$sql="SELECT * FROM im_lineas ORDER BY empresa";
     $res = $con->query($sql);
     $sqlprincipio="SELECT * FROM im_productos ORDER BY accion_terapeutica";
     $resprincipio = $con->query($sqlprincipio);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos - SAPAL</title>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">-->

    </script>  
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

    <script type="text/javascript">
        function listar(a){
            var letra=a;
            var linea  = document.getElementById("linea").value;     linea = linea.substring(5);
            var activo = document.getElementById("principio").value; activo = activo.substring(6); 
            dataframe={"letra":letra,"linea":linea,"activo":activo};
            
            $.ajax({ cache: false,
                url: "ajax/listarproductos.php",
                method: "POST",
                data: dataframe
            }).done(function (data) {
                //alert(data);
                document.getElementById("resultados").innerHTML=data;
            }).fail(function (jqXHR, textStatus) {
                xxx;
            });
        }
    </script>
    <!-- Animación -->
    <script src="js/anim1.js"> </script>
    <script type="text/javascript">
        function buscar(){
            var a = document.getElementById("linea").value;     a = a.substring(5);
            var b = document.getElementById("principio").value; b = b.substring(6);
            var letra =  document.getElementById("buscador").value+"%";
            //alert(letra);
            dataframe={"letra":letra,"linea":a,"activo":b};
            $.ajax({ cache: false,
                url: "ajax/listarproductos.php",
                method: "POST",
                data: dataframe
            }).done(function (data) {
                //alert(data);
                document.getElementById("resultados").innerHTML=data;
            }).fail(function (jqXHR, textStatus) {
                xxx;
            });
        }
    </script>

</head>
<body id="productos" onload="listar('A');">
    <header>
        <!-- Navbar  -->
        <script src="js/menu.js"></script>
        <?php include('menu.php'); ?>
    </header>  
    <div class="desplazador">
        <a><img src="img/tipos/whas.png" width="100px" alt="" style="cursor: pointer;"></a>
    </div>
    <div class="titulos" >
        <h4>Lista de productos</h4>
        <div class="col-lg-6 col-sm-12 parallax04" id="iconos2"> </div>
    </div>

    <div class="row topicos">
        <!-- buscador -->
        <div class="col-lg-4 buscador">
            <h4>Búsqueda de productos</h4>
            <form action="" method="post">
                    <select name="linea" id="linea" >
                    <option value="linea%" selected>Seleccione una línea</option>
                    <?php
                        while($row = mysqli_fetch_assoc($res)){
                            $idlinea = $row["id_linea"];
                            $empresa = $row['empresa'];
                            echo '<option value="linea'.$idlinea.'">'.$empresa.'</option>';
                        }
                    ?>
                    </select>
                        <br>
                    <select name="principio" id="principio" >
                    <option value="accion%" selected>Seleccione un principio activo</option>
                    <?php
                        while($row = mysqli_fetch_assoc($resprincipio)){
                            $id = $row["id"];
                            $accion = $row['accion_terapeutica'];
                            echo '<option value="accion'.$id.'">'.$accion.'</option>';
                        }
                    ?>
                </select>
                <br>
                <input type="text" name="buscador" id="buscador"><input type="button" value="Buscar" onclick="buscar();">
            </form>
        </div>
        <!-- hasta aqui el buscador -->
        <div class="col-lg-7 col-md-10 detalle_buscador">
        <div class='clearfix'></div>
            <div id="loader"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<div id="filtro-letras">
                        <ul id="lista1">
                            <li class="botoncitos"><a class="letras activar_letra" id="A" href="#" onclick="listar('A');">A</a></li>
                            <li class="botoncitos"><a class="letras" id="B" onclick="listar('B');">B</a></li>
                            <li class="botoncitos"><a class="letras" id="C" onclick="listar('C');">C</a></li>
                            <li class="botoncitos"><a class="letras" id="D" onclick="listar('D');">D</a></li>
                            <li class="botoncitos"><a class="letras" id="E" onclick="listar('E');">E</a></li>
                            <li class="botoncitos"><a class="letras" id="F" onclick="listar('F');">F</a></li>
                            <li class="botoncitos"><a class="letras" id="G" onclick="listar('G');">G</a></li>
                            <li class="botoncitos"><a class="letras" id="H" onclick="listar('H');">H</a></li>
                            <li class="botoncitos"><a class="letras" id="I" onclick="listar('I');">I</a></li>
                            <li class="botoncitos"><a class="letras" id="J" onclick="listar('J');">J</a></li>
                            <li class="botoncitos"><a class="letras" id="L" onclick="listar('L');">L</a></li>
                            <li class="botoncitos"><a class="letras" id="M" onclick="listar('M');">M</a></li>
                            <li class="botoncitos"><a class="letras" id="N" onclick="listar('N');">N</a></li>
                            <li class="botoncitos"><a class="letras" id="O" onclick="listar('O');">O</a></li>
                            <li class="botoncitos"><a class="letras" id="P" onclick="listar('P');">P</a></li>
                            <li class="botoncitos"><a class="letras" id="Q" onclick="listar('Q');">Q</a></li>
                            <li class="botoncitos"><a class="letras" id="R" onclick="listar('R');">R</a></li>
                            <li class="botoncitos"><a class="letras" id="S" onclick="listar('S');">S</a></li>
                            <li class="botoncitos"><a class="letras" id="T" onclick="listar('T');">T</a></li>
                            <li class="botoncitos"><a class="letras" id="U" onclick="listar('U');">U</a></li>
                            <li class="botoncitos"><a class="letras" id="V" onclick="listar('V');">V</a></li>
                            <li class="botoncitos"><a class="letras" id="W" onclick="listar('W');">W</a></li>
                            <li class="botoncitos"><a class="letras" id="X" onclick="listar('X');">X</a></li>
                            <li class="botoncitos"><a class="letras" id="Y" onclick="listar('Y');">Y</a></li>
                            <li class="botoncitos"><a class="letras" id="Z" onclick="listar('Z');">Z</a></li>
                        </ul>
                    </div>
                </div>
                <div id="resultados"></div>
        </div>

        </div>
    </div>  
    <div class="row parallax03 illustrator2 animado">
        <div class="descripcion texto">
                <p> PROCESO DE IMPORTACIÓN<br>
                    Gracias al valor del trabajo de nuestro recurso humano EFECTIV FHARMA ha logrado un proceso eficiente, flexible y colaborativo.
                </p>
            </div>
            <div class="descripcion texto1">
                <p> PROCESOS DE ALMACENAMIENTO<br>
                    Gracias al valor del trabajo de nuestro recurso humano EFECTIV FHARMA ha logrado un proceso eficiente, flexible y colaborativo.
                </p>
            </div>
            <div class="descripcion texto2">
                <p> PROCESO DE DISTRIBUCIÓN<br>
                    Gracias al valor del trabajo de nuestro recurso humano EFECTIV FHARMA ha logrado un proceso eficiente, flexible y colaborativo.
                </p>
            </div>
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