<?php 
// Cambiar el valor de la variable
$logged_in = false;
if($logged_in == false){
    header('Location: login.php');
    exit;
}
?>
<?php include 'includes/header.php'; ?>
<h1>Members Area</h1>
<p>Welcome to the members area</p>
<h1>Login</h1>
<b>You need to log in to view this pages</b>
<p>You learn how to create a login system in Unit 16.</p>
<?php include 'includes/footer.php'; ?>