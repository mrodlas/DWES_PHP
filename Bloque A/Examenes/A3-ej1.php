<?php
//Los valores de n y valor son opcionales
// //Genera un array de un tamaño n relleno de números aleatorios que estarán contenidos en el intervalo ($min, $max), o bien si se define el valor del parámetro $value , el array contendrá como primer elemento
// dicho valor y los elementos sucesivos serán incrementos (+1) del elemento anterior.
// Los dos últimos parámetros ($n y $value) son opcionales, y sus valores por defecto
// son 10 y 7 respectivamente
function generaArrayInt(int $min= 0, int $max = 0, int $n = 10, int $value = 7) : array {
    $array = [];
    
    if ($value !== null) {
        // Generar array basado en $value
        for ($i = 0; $i < $n; $i++) {
            $array[] = $value + $i;
        }
    } else {
        // Generar array aleatorio entre $min y $max
        for ($i = 0; $i < $n; $i++) {
            $array[] = rand($min, $max);
        }
    }
    
    return $array;
}
//Genera una funcion que muestre todos los elementos de un array en un formato especifico, todos los elementos separados por un espacio y por comas
function mostrarArray($array){
    $string = "";
    foreach ($array as $elemento){
        //formato de salida
        $string .= "(" . $elemento . "), ";
    }
    return $string;
}
//Genera una funcion que devuelva el minimo del array que se le pase como parámetro
function minimoArrayInt($array){
    $minimo = PHP_INT_MAX;
    foreach ($array as $elemento){
        if ($elemento < $minimo){
            $minimo = $elemento;
        }
    }
    echo $minimo;
}
// Genera una funcion que devuelva el máximo del array que se le pase como parámetro
function maximoArrayInt($array){
    $maximo = PHP_INT_MIN;
    foreach ($array as $elemento){
        if ($elemento > $maximo){
            $maximo = $elemento;
        }
    }
    echo $maximo;
}

//Genera funcion que devuelva la media del array que se le pase como parámetro
function mediaArrayInt($array){
    $media = 0;
    foreach ($array as $elemento){
        $media += $elemento;
    }
    $media = $media / count($array);
    echo $media;
}

//Genera una funcion que devuelva un booleano que indica si el numero que se le pase como parámetro está o no dentro del array
function estaEnArrayInt($array, $numero){
    foreach ($array as $elemento){
        if ($elemento == $numero){
            return true;
        }
    }
    return false;
}
//Genera una funcion que Busca un número en un array y devuelve la posición (el índice) en la que se encuentra
function posicionEnArray($array, $numero){
    foreach ($array as $index => $elemento){
        if ($elemento == $numero){
            return $index;
        }
    }
}

//Genera una funcion : Le da la vuelta a un array (ejemplo: (1, 2, 3) => (3, 2, 1) ).
function volteaArrayInt($array){
    $invertido = [];
    foreach ($array as $elemento){
        array_push($invertido, $elemento);
    }
    return $invertido;
}

//Genera una funcion que calcula la suma acumulativa de los elementos de un array y mantiene el resultado acumulado entre llamadas
function sumaAcumuladaArray($array){
    $acumulado = 0;
    foreach ($array as $elemento){
        $acumulado += $elemento;
    }
    return $acumulado;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <h1>Array 1 (Aleatorios)</h1>
        <p><?= mostrarArray(generaArrayInt($min = 49, $max = 58)) ?></p>
        <h2>Resultados de las funciones</h2>
        <p><b>Mínimo : <?= minimoArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>Máximo : <?= maximoArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>Media : <?= mediaArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>¿Esta el número en el array : <?= estaEnArrayInt(generaArrayInt($min, $max), 7) ?></b></p>
        <p><b>Posición del número en el array : <?= posicionEnArray(generaArrayInt($min, $max), 7) ?></b></p>
        <h1>Array Modificado </h1>
        <p><b>Array Volteado : <?= mostrarArray(volteaArrayInt(generaArrayInt($min, $max))) ?></b></p>
        <h1>Suma Acumulada</h1>
        <p><b>Suma Acumulada : <?= sumaAcumuladaArray(generaArrayInt($min, $max)) ?></b></p>
        <hr>
        <h1>Array 2 (Valor Fijo)</h1>
        <p><?= mostrarArray(generaArrayInt($value = 3)) ?></p>
        <h2>Resultados de las funciones</h2>
        <p><b>Mínimo : <?= minimoArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>Máximo : <?= maximoArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>Media : <?= mediaArrayInt(generaArrayInt($min, $max)) ?></b></p>
        <p><b>¿Esta el número en el array : <?= estaEnArrayInt(generaArrayInt($min, $max), 50) ?></b></p>
        <p><b>Posición del número en el array : <?= posicionEnArray(generaArrayInt($min, $max), 50) ?></b></p>
        <h1>Array Modificado </h1>
        <p><b>Array Volteado : <?= mostrarArray(volteaArrayInt(generaArrayInt($min, $max))) ?></b></p>
        <h1>Suma Acumulada</h1>
        <p><b>Suma Acumulada : <?= sumaAcumuladaArray(generaArrayInt($min, $max)) ?></b></p>
        
    </body>
</html>