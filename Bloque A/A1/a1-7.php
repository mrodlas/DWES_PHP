<?php
$name = 'Maria';
$favorites = ['Marshmallow', 'Chocolate', 'Toffee', 'Fudge'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo Shorthand</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Welcome <?php echo $name; ?></h2>
    <p>Your favorite type of candy is: <?php echo $favorites[0]; ?>.</p>
</body>
</html>