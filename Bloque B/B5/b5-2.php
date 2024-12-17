<?php

// Variables: Nuevo texto del artículo
$text = '<h1>Cómo Mejorar tu Productividad en 5 Pasos</h1>
        <p>Para optimizar tu tiempo, establece objetivos claros, prioriza tus tareas y elimina distracciones.
        Utiliza técnicas efectivas como el método Pomodoro y la regla 80/20 para enfocarte en lo que realmente importa. </br>
        Reflexiona al final del día sobre tus logros y áreas de mejora. ¡Cada minuto cuenta! </p>';

// 1. Detectar la Primera y última aparición de la palabra "tu"
$palPrimeraAparicion = stripos($text, 'tu');
$palUltimaAparicion = strripos($text, 'tu');

// 2. Encontrar la palabra clave "Pomodoro"
$palabraClave = str_contains($text, "Pomodoro");

// 3. Extraer partes del texto basadas en subcadenas específicas
$textoExtraido = strstr($text, "Reflexiona");

// 4. Comprobar si el texto comienza o termina con ciertas palabras
$comienzo = str_starts_with($text, "<h1>");
$final = str_ends_with($text, "!");

?>

<!-- HTML -->
<?php include 'includes/header.php'; ?>

<!-- Mostrar el texto original -->
<?= $text ?>

<h2>1. Primera y última aparición de la palabra "tu"</h2>
<ul>
    <li>Primera aparición: <?= $palPrimeraAparicion !== false ? $palPrimeraAparicion : 'No encontrada' ?></li>
    <li>Última aparición: <?= $palUltimaAparicion !== false ? $palUltimaAparicion : 'No encontrada' ?></li>
</ul>

<h2>2. Encontrar Palabras Clave</h2>
<p>¿El texto contiene la palabra clave "Pomodoro"?: <?= $palabraClave ? 'Sí' : 'No' ?></p>

<h2>3. Extraer partes del texto</h2>
<p>Texto desde "Reflexiona": <?= $textoExtraido ?: 'No encontrada la subcadena "Reflexiona"' ?></p>

<h2>4. Comprobar si el texto comienza o termina con ciertos caracteres</h2>
<ul>
    <li>¿Comienza con "&lt;h1&gt;"?: <?= $comienzo ? 'Sí' : 'No' ?></li>
    <li>¿Termina con "!"?: <?= $final ? 'Sí' : 'No' ?></li>
</ul>

<?php include 'includes/footer.php'; ?>
