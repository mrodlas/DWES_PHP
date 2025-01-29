<?php 
$mensaje = '';
$confirmacion = 'Se ha subido correctamente';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if($_FILES['image']['error'] === 0){
        // Guardar el sitio temporal 
        $temporal = $_FILES['image']['tmp_name'];
        $ruta = './var/www/images/' . $_FILES['image']['name'];

        // Si todo funciona movemos la imagen a ese sitio 
        $mover = move_uploaded_file($temporal, $ruta);
        // Mandamos el mensaje de confirmacion
        $mensaje = '<b>Fichero:</b>' . $_FILES['image']['name'] . '<br>';
        $mensaje .= '<b>Size:</b>' . $_FILES['image']['size'] . ' bytes <br>';
        $mensaje .= 'El archivo se ha cargado correctamente';

    }else{
        $mensaje = 'No se ha podido cargar el archivo';
    }
    // Comprobar si se ha movido
    if($mover === true){
        $mensaje .= '<img src="'.$ruta.'">';

    }
    else{
        $mensaje = 'La imagen no se ha movido <br>';
    }
}
?>
<?php include '../includes/header.php' ?>
<h1>Cargar Archivos</h1>
<p><?= $mensaje?></p>
<!-- Para incriptar las imagenes (enctype) -->
<!-- el php_self lo que hace es llamar a la misma pagina -->
<form method="POST" action="<?= $_SERVER['PHP_SELF']?> "enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <br>
        <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php' ?>