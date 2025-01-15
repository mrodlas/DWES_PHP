<?php
declare(strict_types = 1);
$age     = '';
$message = '';

function is_number($number, int $min = 8, int $max = 16): bool
{
    return ($number >= $min and $number <= $max);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $age   = $_POST['age'];
    $valid = is_number($age, 16, 65); // Modificado para el rango 8-16
    if ($valid) {
        $message = 'Age is valid';
    } else {
        $message = 'You must be 16-65';
    }
}
?>
<?php include 'includes/header.php'; ?>

<?= $message ?>
<form action="index.php" method="POST">
  Age: <input type="text" name="age" size="4"
              value="<?= htmlspecialchars($age) ?>"> 
  <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>