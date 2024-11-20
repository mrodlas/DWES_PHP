<?php
function tablaMultiplicar($numero) {
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        ?>
            <table>
                <tr>
                    <td><?= $numero ?></td>
                    <td>*</td>
                    <td><?= $i ?></td>
                    <td>=</td>
                    <td><?= $resultado ?></td>
                </tr>
            </table>
        <?php
    }
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 1</title>
	</head>
	<body>
		<h1>Ejercicio 1</h1>
		<p>Escriba un programa que reciba un numero como parametro y devuelva la tabla de multiplicar de ese numero.</p>
            <?php
                tablaMultiplicar(7);
            ?>
	</body>
</html>