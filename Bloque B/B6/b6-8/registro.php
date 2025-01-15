<?php include 'includes/header.php'; ?>

<?php
// Verificamos si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $nombre = htmlspecialchars($_POST['nombre'] ?? '');
    $apellido = htmlspecialchars($_POST['apellido'] ?? '');
    $edad = htmlspecialchars($_POST['edad'] ?? '');
    $posicion = htmlspecialchars($_POST['posicion'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $telefono = htmlspecialchars($_POST['telefono'] ?? '');

    echo "<h2>Registro Completo</h2>";
    echo "<p>Nombre: $nombre</p>";
    echo "<p>Apellido: $apellido</p>";
    echo "<p>Edad: $edad</p>";
    echo "<p>Posición: $posicion</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Teléfono: $telefono</p>";
} else { ?>
    <!-- Formulario de registro -->
    <form action="registro.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="1" required><br><br>

        <label for="posicion">Posición:</label>
        <input type="text" id="posicion" name="posicion" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br><br>

        <input type="submit" value="Registrar">
    </form>
<?php } ?>

<?php include 'includes/footer.php'; ?>