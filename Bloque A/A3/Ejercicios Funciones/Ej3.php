<?php
function generarLista($tipo){
    //a partir de un array de elementos, generar una lista
    $elementos = array("Item 1", "Item 2", "Item 3");
    
    echo "<$tipo>";
    foreach ($elementos as $elemento) {
        echo "<li>$elemento</li>";
    }
    echo "</$tipo>";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 3</title>
    </head>
    <body>
        <h1>Ejercicio 3</h1>
        <p>Escriba un programa que genere una lista de elementos.</p>
        <?php
            generarLista("ol");
        ?>
    </body>
</html>