<?php
// Iniciar sesión (opcional, pero útil si quieres combinarlo con sesiones en el futuro)
session_start();

// Si se envió el formulario, almacenar el nombre en una cookie de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"])) {
    $nombre = htmlspecialchars($_POST["nombre"]);
    setcookie("usuario", $nombre, 0, "/"); // Cookie de sesión (expira al cerrar el navegador)
}

// Si la cookie ya está establecida, obtener el nombre
$nombreUsuario = isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : "";
?>

<?php include 'includes/header.php'; ?>
    <?php if ($nombreUsuario): ?>
        <h1>Bienvenido de nuevo, <?= $nombreUsuario ?>!</h1>
        <p><a href="logout.php">Salir</a></p>
    <?php else: ?>
        <h1>Introduce tu nombre</h1>
        <form method="POST" action="">
            <input type="text" name="nombre" required>
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>

    <?php include 'includes/footer.php'; ?>


