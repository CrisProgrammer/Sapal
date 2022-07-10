<?php
 	require_once ("inicio.php");
     //$letra = $_POST['letra'];
     $sql="SELECT * FROM im_lineas ORDER BY empresa";
     $res = $con->query($sql);
     $sqlprincipio="SELECT * FROM im_productos ORDER BY accion_terapeutica";
     $resprincipio = $con->query($sqlprincipio);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
    <script type="text/javascript">
        function buscar(){
            var a = document.getElementById("linea").value;     a = a.substring(5);
            var b = document.getElementById("principio").value; b = b.substring(6);
            var letra = "%";
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
<body>
    <div>
    <form action="" method="post">
        <label for="linea">Línea <select name="linea" id="linea" >
            <option value="linea%" selected>Seleccione una línea</option>
            <?php
                while($row = mysqli_fetch_assoc($res)){
                    $idlinea = $row["id_linea"];
                    $empresa = $row['empresa'];
                    echo '<option value="linea'.$idlinea.'">'.$empresa.'</option>';
                }
            ?>
        </select></label>
                <br>
        <label for="principio">Principio activo <select name="principio" id="principio" >
            <option value="accion%" selected>Seleccione un principio activo</option>
            <?php
                while($row = mysqli_fetch_assoc($resprincipio)){
                    $id = $row["id"];
                    $accion = $row['accion_terapeutica'];
                    echo '<option value="accion'.$id.'">'.$accion.'</option>';
                }
            ?>
        </select></label>
        <br>
        <input type="text" name="buscador" id="buscador"><input type="button" value="Buscar" onclick="buscar();">
    </form>
    </div>
</body>
</html>