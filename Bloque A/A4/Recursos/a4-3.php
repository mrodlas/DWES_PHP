<?php
declare(strict_types = 1);

class Account {
    public    int    $number;
    public    string $type;
    protected float  $balance;
    //Añadimos una propiedad privada de tipo string
    private string $owner;

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

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): string
    {
        $this->owner = $owner;
        return $this->owner;
    }
}

$account = new Account(20148896, 'Savings', 80.00);
$account = new Account(34567890, 'Savings', 90.00);
?>
<?php include 'includes/header.php'; ?>
<h2><?= $account->type ?> Account</h2>
<p>Previous balance: $<?= $account->getBalance() ?></p>
<p>New balance: $<?= $account->deposit(35.00) ?></p>
<p>Owner: <?= $account->setOwner('Maria') ?></p>
<?php include 'includes/footer.php'; ?>