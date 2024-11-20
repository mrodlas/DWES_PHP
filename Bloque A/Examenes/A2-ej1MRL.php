
<?php
$number = 7;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Examen Unidad 2</title>
    <link rel="stylesheet" href="css/estiloEj1.css">
</head>
<body>
    <h1>Tabla de multiplicar del <?= $number ?></h1>
    <table>
        <tr>
            <th>a</th>
            <th>*</th>
            <th>b</th>
            <th>=</th>
            <th>a*b</th>
        </tr>
        <?php for($i = 1; $i <= 10; $i++) { 
            $c = $number * $i; // Calcular el resultado dentro del bucle para cada iteración
        ?>
            <tr>
                <td><?= $number ?></td>
                <td>*</td>
                <td><?= $i ?></td>
                <td>=</td>
                <td><?= $c ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
