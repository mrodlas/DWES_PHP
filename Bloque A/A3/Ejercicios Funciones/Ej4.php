<?php
function generar_contraseña($longitud = 8) {
    // Variable estática para contar cuántas contraseñas se han generado
    static $contador = 0;
    $contador++;

    // Caracteres posibles para la contraseña
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
    $contraseña = '';

    // Generar la contraseña aleatoria
    for ($i = 0; $i < $longitud; $i++) {
        // Seleccionar un carácter aleatorio del conjunto de caracteres
        $contraseña .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }

    // Imprimir la contraseña generada y el contador de contraseñas
    echo "Contraseña generada: " . $contraseña . "<br>";
    echo "Número de contraseñas generadas: " . $contador . "<br>";
    
    return $contraseña;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar contraseñas</title>
</head>
<body>
    <h1> Ejercicio 4 </h1>
    <p>Ejercicio para crear contraseñas aleatorias.</p>
    <?php
        // Ejemplo de uso
        generar_contraseña(12); // Genera una contraseña de 12 caracteres
        generar_contraseña(10); // Genera una contraseña de 10 caracteres
    ?>
</body>
</html>