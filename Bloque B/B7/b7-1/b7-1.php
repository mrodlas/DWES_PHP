<?php 

include '../includes/header.php';
$mensaje = '';
$confirmacion = 'Se ha subido correctamente';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if($_FILES['image']['error'] === 0){
        $mensaje = '<b>Fichero:</b>' . $_FILES['image']['name'] . '<br>';
        $mensaje .= '<b>El archivo ha sido subido con exito :D</b>';
    }else{
        $mensaje = 'No se ha podido cargar el archivo';
    }
}
?>

<h1>Cargar Archivos</h1>
<p><?= $mensaje?></p>
<form method="POST" action="b7-1.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <br>
        <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php'; ?>