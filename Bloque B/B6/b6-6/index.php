<?php 
$sms_malefico= "<p>Atencion!! ('XSS Attempt!')</p>";
$sms_scape = htmlspecialchars($sms_malefico, ENT_QUOTES, 'UTF-8');
?>
<?php include 'includes/header.php' ?>
<!-- Actividad 6 -->
<h1>Actividad 6: Mensaje malefico</h1>
<a href="b6.6_1xss.php?msg=<?= $sms_scape?>">Haz clic aquí para enviar un mensaje malefico</a>

<?php include 'includes/footer.php' ?><?php 
$sms_malefico= "<p>Atencion!! ('XSS Attempt!')</p>";
$sms_scape = htmlspecialchars($sms_malefico, ENT_QUOTES, 'UTF-8');
?>
