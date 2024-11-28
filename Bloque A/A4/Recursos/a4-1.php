<?php
class Customer
{
    public string $forename;
    public string $surname;
    public string $email;
    public string $password;
}

class Account
{
    public int    $number;
    public string $type;
    public float  $balance;
}

$customer = new Customer();
$account  = new Account();
$customer->email  = 'ivy@eg.link';
//establecer el nombre y apellidos del cliente en el objeto customer
$customer->forename = 'María';
$customer->surname  = 'Rodríguez';
$account->balance = 1000.00;
?>
<?php include 'includes/header.php'; ?>
  <!-- muestra el nombre antes de la dirección de correo electrónico -->
  <p>Nombre: <?= $customer->forename ?> <?= $customer->surname ?></p>
  <p>Email: <?= $customer->email ?></p>
  <p>Balance: $<?= $account->balance ?></p>
<?php include 'includes/footer.php'; ?>