<?php
$text = 'Home sweet home';
$txtblog = 'Bienvenidos a la web de mi blog. Este es el primer post de mi blog. Este post es muy bueno. Nosotros estamos en el primer post.';

function contarFrecuenciaPalabras($txtblog): void{
    // Contar la frecuencia de cada palabra en el texto
    // Array -> Añadimos las palabras del texto a un array quitando los espacios
    $arrayPalabrasTxt = array_filter(preg_split('/\s+/', $txtblog));

    // Array sin palabras repetidas
    $arraySinPalabrasRepetidas = array_unique($arrayPalabrasTxt);

    // Recorremos el array de palabras sin repetir
    foreach ($arraySinPalabrasRepetidas as $palabra) {
        // Contar la frecuencia de cada palabra en el texto
        $frecuenciaPalabra = substr_count($txtblog, $palabra);
        echo "La palabra '$palabra' aparece $frecuenciaPalabra veces en el texto. <br>";
    }

}
?>

<?php include 'includes/header.php'; ?>

<p><b>Texto original: </b><?= $txtblog?></p>
    <!-- La frase se pasa a minuscula -->
    <p><b>Lowercase:</b> <?= strtolower($txtblog) ?></p>
    <!-- La frase se pasa a mayuscula -->
    <p><b>Uppercase:</b> <?= strtoupper($txtblog) ?></p>
    <!-- Las primeras en mayuscula -->
    <p><b>Uppercase first letter:</b> <?= ucwords($txtblog) ?></p>
    <!-- Recuento de caracteres -->
    <p><b>Character count:</b> <?= strlen($txtblog) ?></p>
    <!--Recuento de caracteres sin espacios -->
    <p><b>Character count without spaces:</b> <?= strlen(preg_replace('/\s+/', '', $txtblog)) ?></p>
    <!-- Recueto de palabras -->
    <p><b>Word count:</b> <?= str_word_count($txtblog) ?></p>
    <!-- Calcula el número de palabras en el texto -->
    <p><?php contarFrecuenciaPalabras($txtblog) ?></p>
</p>

<?php include 'includes/footer.php'; ?>