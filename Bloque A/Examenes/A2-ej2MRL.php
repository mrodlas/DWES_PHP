<?php
for ($i = 1; $i <= 3; $i++) {
    $rows = 5 * $i;
    $columns = 6 * $i;

    echo "<table>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $columns; $c++) {
            // Verificar si la celda está en el borde
            if ($r == 1 || $r == $rows || $c == 1 || $c == $columns) {
                echo "<td>($r, $c)</td>";
            } else {
                echo "<td></td>"; // Celda en blanco
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<hr><br>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 Examen Unidad 2</title>
    <style>
        td {
            border: 1px solid #ddd;
            padding: 4px;
        }
        tr {
            border: 1px solid #ddd;
            padding: 4px;
        }
    </style>
</head>
<body>

</body>
</html>
