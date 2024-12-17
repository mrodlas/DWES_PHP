<?php
// Array de Canciones con nuevas canciones y reproducciones
$canciones_con_reproducciones = [
    "Shape of You - Ed Sheeran" => 2500,
    "Bad Bunny - Yo Perreo Sola" => 2200,
    "Blinding Lights - The Weeknd" => 2800,
    "Levitating - Dua Lipa" => 2300,
    "Peaches - Justin Bieber" => 1900
];

// FUNCIONES DE ORDENAMIENTO Y ACTUALIZACIÓN
// 1. Generar reproducciones aleatorias
function generarReproduccionesAleatorias($canciones) {
    foreach ($canciones as $cancion => $rep) {
        $canciones[$cancion] = mt_rand(1000, 3000);  // Reproducciones aleatorias entre 1000 y 3000
    }
    return $canciones;
}

// 2. Ordenar canciones por nombre ascendente
function ordenarPorNombreAsc($canciones) {
    ksort($canciones);  // Ordenamos por clave (nombre de canción) en orden ascendente
    return $canciones;
}

// 3. Ordenar canciones por nombre descendente
function ordenarPorNombreDesc($canciones) {
    krsort($canciones);  // Ordenamos por clave (nombre de canción) en orden descendente
    return $canciones;
}

// 4. Ordenar canciones por reproducciones ascendente
function ordenarPorReproduccionesAsc($canciones) {
    asort($canciones);  // Ordenamos por valor (número de reproducciones) en orden ascendente
    return $canciones;
}

// 5. Ordenar canciones por reproducciones descendente
function ordenarPorReproduccionesDesc($canciones) {
    arsort($canciones);  // Ordenamos por valor (número de reproducciones) en orden descendente
    return $canciones;
}

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h1>Canciones con Reproducciones Aleatorias:</h1>
<?php
    // Generar reproducciones aleatorias
    $cancionesConReproduccionesAleatorias = generarReproduccionesAleatorias($canciones_con_reproducciones);
    
    foreach ($cancionesConReproduccionesAleatorias as $cancion => $numRep):
?>
    <p><strong>Song:</strong> <?= $cancion ?> | <strong>Reproductions:</strong> <?= $numRep ?></p>
<?php endforeach; ?>

<hr>

<h1>Ordenadas por Nombre de Canción Ascendente:</h1>
<?php 
    // Ordenamos las canciones por nombre ascendente
    $cancionesOrdenadasAscNombre = ordenarPorNombreAsc($cancionesConReproduccionesAleatorias);

    foreach ($cancionesOrdenadasAscNombre as $cancion => $numRep):
?>
    <p><strong>Song:</strong> <?= $cancion ?> | <strong>Reproductions:</strong> <?= $numRep ?></p>
<?php endforeach; ?>

<h1>Ordenadas por Nombre de Canción Descendente:</h1>
<?php 
    // Ordenamos las canciones por nombre descendente
    $cancionesOrdenadasDescNombre = ordenarPorNombreDesc($cancionesConReproduccionesAleatorias);

    foreach ($cancionesOrdenadasDescNombre as $cancion => $numRep):
?>
    <p><strong>Song:</strong> <?= $cancion ?> | <strong>Reproductions:</strong> <?= $numRep ?></p>
<?php endforeach; ?>

<hr>

<h1>Ordenadas por Reproducciones Ascendente:</h1>
<?php 
    // Ordenamos las canciones por número de reproducciones ascendente
    $cancionesOrdenadasAscReproducciones = ordenarPorReproduccionesAsc($cancionesConReproduccionesAleatorias);

    foreach ($cancionesOrdenadasAscReproducciones as $cancion => $numRep):
?>
    <p><strong>Song:</strong> <?= $cancion ?> | <strong>Reproductions:</strong> <?= $numRep ?></p>
<?php endforeach; ?>

<h1>Ordenadas por Reproducciones Descendente:</h1>
<?php 
    // Ordenamos las canciones por número de reproducciones descendente
    $cancionesOrdenadasDescReproducciones = ordenarPorReproduccionesDesc($cancionesConReproduccionesAleatorias);

    foreach ($cancionesOrdenadasDescReproducciones as $cancion => $numRep):
?>
    <p><strong>Song:</strong> <?= $cancion ?> | <strong>Reproductions:</strong> <?= $numRep ?></p>
<?php endforeach; ?>

<?php include './includes/footer.php'; ?>
