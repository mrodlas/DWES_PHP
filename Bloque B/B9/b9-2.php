<?php

$idiomas = [
    'en' => 'Inglés',
    'es' => 'Español'
];

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
    $idioma_seleccionado = $_POST['idioma'];

    // Validar que el idioma seleccionado esté en la lista de idiomas disponibles
    if (array_key_exists($idioma_seleccionado, $idiomas)) {
        // Almacenar la preferencia en una cookie (duración: 30 días)
        setcookie('idioma', $idioma_seleccionado, time() + (30 * 24 * 60 * 60), '/');

        // Redirigir para evitar reenvío del formulario
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Obtener el idioma preferido de la cookie (si existe)
$idioma_preferido = $_COOKIE['idioma'] ?? null;
?>

<?php include 'includes/header.php'; ?>
<?php if ($idioma_preferido){ ?>
        <?php if ($idioma_preferido === 'es'){ ?>
            <h1>Bienvenido a nuestro sitio web</h1>
            <p>Has seleccionado Español como tu idioma preferido.</p>
        <?php } else { ?>
            <h1>Welcome to our website</h1>
            <p>You have selected English as your preferred language.</p>
        <?php } ?>
    <?php } else{ ?>
        <!-- Mostrar formulario de selección de idioma -->
        <h1>Selecciona tu idioma preferido</h1>
        <form method="POST" action="">
            <label>
                <input type="radio" name="idioma" value="en"> Inglés
            </label>
            <br>
            <label>
                <input type="radio" name="idioma" value="es"> Español
            </label>
            <br><br>
            <button type="submit">Guardar preferencia</button>
        </form>
    <?php } ?>
    <?php include 'includes/footer.php'; ?>