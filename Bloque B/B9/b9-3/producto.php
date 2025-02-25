<?php
session_start();

$productos = [
    ["nombre" => "Pantalon", "precio" => 20],
    ["nombre" => "Camiseta", "precio" => 10],
    ["nombre" => "Vestido", "precio" => 30]
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    if (!isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id] = ["nombre" => $productos[$id]["nombre"], "precio" => $productos[$id]["precio"], "cantidad" => 1];
    } else {
        $_SESSION["carrito"][$id]["cantidad"]++;
    }

    header("Location: cart.php");
    exit();
}
?>
<?php include '../includes/header.php'; ?>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach ($productos as $id => $producto){ ?>
            <li>
                <?=$producto["nombre"] . " " . $producto["precio"] . " €" ; ?>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button type="submit">Añadir al carrito</button>
                </form>
                <br>
            </li>
        <?php } ?>
    </ul>
    <br>
    <a href="cart.php">Ver carrito</a>
    <?php include '../includes/footer.php'; ?>