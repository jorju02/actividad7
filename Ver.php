<?php

$mysqli = new mysqli("localhost", "root", "", "centrofp");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VER</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center">ALUMNOS</h1>
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th> Codigo Matricula</th>
            <th>Ciclo</th>
        </tr>
        <?php

        /* Sentencia no preparada */
        $resultado = $mysqli->query("SELECT * FROM alumno WHERE dni='" . $_GET['dni'] . "'");

        // mostrar resultado
        while ($row = $resultado->fetch_assoc()) {

            echo "<tr>
                    <td>" . $row['dni'] . "</td>"
                    . "<td>" . $row['nombre'] . "</td>"
                    . "<td>" . $row['apellido'] . "</td>"
                    . "<td>" . $row['email'] . "</td>"
                    . "<td>" . $row['codMatricula'] . "</td>"
                    . "<td>" . $row['ciclo'] . "</td>"
                . "</tr>";
        }

        ?>

    </table>

    <a href="javascript:history.back()"> Volver Atrás</a>

</body>

</html>