<?php
session_start();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];
    $id = $_POST["id"] ?? null;

    if ($accion === "incrementar" && isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]["cantidad"]++;
    }

    if ($accion === "decrementar" && isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]["cantidad"]--;
        if ($_SESSION["carrito"][$id]["cantidad"] <= 0) {
            unset($_SESSION["carrito"][$id]);
        }
    }

    if ($accion === "vaciar") {
        unset($_SESSION["carrito"]);
    }

    header("Location: cart.php");
    exit();
}
?>

<?php include './includes/header.php'; ?>
    <h1>Carrito de Compras</h1>
    <ul>
        <?php 
        $total = 0;
        if (!empty($_SESSION["carrito"])){
            foreach ($_SESSION["carrito"] as $id => $producto){ 
                $subtotal = $producto["precio"] * $producto["cantidad"];
                $total += $subtotal;
        ?>
            <li>
                <?= "{$producto['nombre']} - \${$producto['precio']} x {$producto['cantidad']} = \${$subtotal}"; ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button type="submit" name="accion" value="incrementar">+</button>
                    <button type="submit" name="accion" value="decrementar">-</button>
                </form>
            </li>
        <?php }?>
        <?php } else{ ?>
            <p>El carrito está vacío.</p>
        <?php } ?>
    </ul>

    <p>Total: $<?= $total; ?></p>

    <form method="post">
        <button type="submit" name="accion" value="vaciar">Vaciar Carrito</button>
    </form>
    <br>
    <a href="products.php">Seguir comprando</a>
    <a href="checkout.php">Finalizar compra</a>
    <?php include './includes/footer.php'; ?>