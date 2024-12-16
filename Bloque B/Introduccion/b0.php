<?php
$username = 'Ivy';

$user_array = [
    'name' => 'Ivy',
    'age' => 24,
    'active' => true,
];

class User{
    public $name;
    public $age;
    public $active;

    public function __construct($name, $age, $active){
        $this->name = $name;
        $this->age = $age;
        $this->active = $active;
    }

}

$user_object = new User('Ivy', 24, true);
?>

<?php include 'includes/header.php'; ?>
<body>
	<p>Scalar: <pre><?php var_dump($username); ?></pre></p>
	<p>Array: <pre><?php var_dump($user_array); ?></pre></p>
	<p>Object: <pre><?php var_dump($user_object); ?></pre></p>
</body>
<?php include 'includes/footer.php'; ?>
