<?php
function calcularArea($dimension1, $dimension2 = null, $dimension3 = "cuadrado") {
    //lógica para calcular el area según el tipo de figura
    if ($dimension3 == "cuadrado") {
        $area = $dimension1 * $dimension2;
    } else if ($dimension3 == "rectangulo") {
        $area = $dimension1 * $dimension2;
    } else if ($dimension3 == "circular") {
        $area = pi() * ($dimension1 * $dimension2);
    } else {
        echo "Error: Tipo de figura no válido";
    }
    return $area;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 2</title>
    </head>
    <body>
        <h1>Ejercicio 2</h1>
        <p>Escriba un programa que reciba tres dimensiones y devuelva el área de una figura.</p>
            <?php
                $dimension1 = 10;
                $dimension2 = 5;
                $dimension3 = "cuadrado";
                echo "El área de la figura es: " . calcularArea($dimension1, $dimension2, $dimension3);
            ?>
        </form>
    </body>
</html>