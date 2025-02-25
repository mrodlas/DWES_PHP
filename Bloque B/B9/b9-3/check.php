<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION["carrito"]);
    $mensaje = "Compra finalizada con éxito.";
}
?>

<?php include './includes/header.php'; ?>
    <h1>Finalizar Compra</h1>

    <?php if (isset($mensaje)){?>
        <p><?= $mensaje; ?></p>
    <?php } else{ ?>
        <p>¿Estás seguro de que quieres finalizar la compra?</p>
        <form method="post">
            <button type="submit">Confirmar compra</button>
        </form>
    <?php }?>
    <br>
    <a href="products.php">Volver a la tienda</a>
<?php include './includes/footer.php'; ?>