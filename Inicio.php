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
  <title>INICIO</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    table {
      width: 50%;
      
    }
    .btAnadir{
      color: black;
      text-decoration: none
      
    }
  </style>
</head>

<body>
  <h1 style="text-align:center">ALUMNOS</h1>
  <table>
    <tr>
      <th>DNI</th>
      <th>Nombre</th>
    </tr>
    <?php

    /* Sentencia no preparada */
    $resultado = $mysqli->query("SELECT * FROM alumno");

    // mostrar resultado
    while ($row = $resultado->fetch_assoc()) {

      echo "<tr>
        <td><a href='Ver.php?dni=" . $row['dni'] . "'>" . $row['dni'] . "</a></td>"
        . "<td>" . $row['nombre'] . "</td>" . "<td><a href='Eliminar.php?dni=" . $row['dni'] . "'>Eliminar</a></td>"
        . "<td><a href='Editar.php?dni=" . $row['dni'] . "'>Editar</a></td>
     </tr>";
    }
    ?>

  </table>

  <button><a class="btAnadir" href="Anadir.php">AÑADIR UNO NUEVO</a></button>

</body>

</html>