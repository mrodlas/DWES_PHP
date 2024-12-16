<?php
$text = 'Home sweet home';
?>

<?php include 'includes/header.php'; ?>

<p>
    <b>Lowercase:</b> <?php echo strtolower($text); ?><br>
    <b>Uppercase:</b> <?php echo strtoupper($text); ?><br>
    <b>Uppercase first letter:</b> <?php echo ucwords($text); ?><br>
    <b>Character count:</b> <?php echo strlen($text); ?><br>
    <b>Word count:</b> <?php echo str_word_count($text); ?><br>
</p>

<?php include 'includes/footer.php'; ?>