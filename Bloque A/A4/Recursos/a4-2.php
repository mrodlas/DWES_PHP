<?php
declare(strict_types = 1);

include 'classes/Product.php';

class Account
{
    public int    $number;
    public string $type;
    public float  $balance;

    public function __construct(int $number, string $type, float $balance = 0.00)
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }
}

$checking = new Account(43161176, 'Checking', 32.00);
$savings  = new Account(20148896, 'Savings', 756.00);
//Instanciamos un objeto de tipo product
$product = new Product(1, 'Apple', 1.00, 10);
//creamos otra instancia de tipo product
$product2 = new Product(2, 'Orange', 0.50, 5);
?>

<?php include 'includes/header.php'; ?>
<h2>Account Balances</h2>
<table>
  <tr>
    <th>Date</th>
    <th><?= $checking->type ?></th>
    <th><?= $savings->type  ?></th>
  </tr>
  <tr>
    <td>23 June</td>
    <td>$<?= $checking->balance ?></td>
    <td>$<?= $savings->balance  ?></td>
  </tr>
  <tr>
    <td>24 June</td>
    <td>$<?= $checking->deposit(12.00)  ?></td>
    <td>$<?= $savings->withdraw(100.00) ?></td>
  </tr>
  <tr>
    <td>25 June</td>
    <td>$<?= $checking->withdraw(5.00) ?></td>
    <td>$<?= $savings->deposit(300.00) ?></td>
  </tr>
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Stock</th>
  </tr>
  <tr>
    <td><?= $product->name ?></td>
    <td>$<?= $product->price ?></td>
    <td><?= $product->stock ?></td>
  </tr>
  <tr>
    <td><?= $product2->name ?></td>
    <td>$<?= $product2->price ?></td>
    <td><?= $product2->stock ?></td>
  </tr>
</table>
<?php include 'includes/footer.php'; ?>