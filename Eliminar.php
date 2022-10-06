<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];

        $mysqli = new mysqli("localhost", "root", "", "centrofp");
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        /* Sentencia preparada, etapa 1: preparación */
        if (!($sentencia = $mysqli->prepare("DELETE FROM alumno WHERE dni=?"))) {
            echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        /* Sentencia preparada, etapa 2: vinculación y ejecución */
        if (!$sentencia->bind_param("s", $dni)) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        /* se recomienda el cierre explícito */
        $sentencia->close();


        echo "<h1>ELIMINADO CORRECTAMENTE</h1>";
    } else {
        echo ("<br>Error en parametros<br>");
    }
    
        header("Location: Inicio.php");

    ?>
   

</body>

</html>