<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            input {
                width: 50%;
            }
        </style>
    </head>

    <body style="text-align:center ;">
        <h1>FORMULARIO DE NUEVO ALUMNO</h1>
        <form action="Anadir.php" method="GET">
            <input name="DNI" placeholder="DNI" type="text"><br>
            <input name="nombre" placeholder="nombre" type="text"><br>
            <input name="apellido" placeholder="apellido" type="text"><br>
            <input name="email" placeholder="email" type="text"><br>
            <input name="codMatricula" placeholder="codMatricula" type="text"><br>
            <input name="ciclo" placeholder="ciclo" type="text"><br>
            <input type="submit">
            <input type="reset">
        </form>
   
        <?php
            if (isset($_GET['DNI']) && isset($_GET['nombre'])&& isset($_GET['apellido'])&& isset($_GET['email'])&& isset($_GET['codMatricula'])&& isset($_GET['ciclo'])) {
            $dni = $_GET['DNI'];
            $nombre = $_GET['nombre'];
            $apellido=$_GET['apellido'];
            $email=$_GET['email'];
            $codMatricula=$_GET['codMatricula'];
            $ciclo=$_GET['ciclo'];



            $mysqli = new mysqli("localhost", "root", "", "centrofp");

            if ($mysqli->connect_errno) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            /* Sentencia preparada, etapa 1: preparación */
            if (! ($sentencia = $mysqli->prepare("INSERT INTO alumno(dni, nombre,apellido,email,codMatricula,ciclo) VALUES (?, ?, ?, ?, ?, ?)"))) {
                echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
            }

            /* Sentencia preparada, etapa 2: vinculación y ejecución */
            if (! $sentencia->bind_param("ssssss", $dni, $nombre,$apellido,$email,$codMatricula,$ciclo)) {
                echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
            }

            if (! $sentencia->execute()) {
                echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }

            /* se recomienda el cierre explícito */
            $sentencia->close();
            header("Location: Inicio.php");
        }
        ?>
    </body>
</html>