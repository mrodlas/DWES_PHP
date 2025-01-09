<?php
/**
 * AVISO: NO DEBÉIS CAMBIAR NADA DE ESTE SCRIPT PRINCIPAL
 */

// Incluimos las clases previamente definidas
require_once 'ListaDeDeseos.php';
require_once 'CalculadoraDeNavidad.php';

/**
 * SIMULACIÓN DE CARTAS RECIBIDAS 
 * Supondremos que una carta está asociada a una casa (cuando hablemos de carta o casa nos referimos a lo mismo)
 */
$cartas = [];
array_push($cartas, "Querido Santa, este año quiero una bicicleta o una videoconsola. Como no sea así me voy con los reyes tonto");
array_push($cartas, "Querido Santa, este año me gustaría un libro de aventuras o un robot a control remoto. ¡Gracias por todo!");
array_push($cartas, "Hola Santa, espero que estés bien. Este año me encantaría recibir un set de construcción o un libro de aventuras. ¡Gracias de antemano!");
array_push($cartas, "Querido Santa Claus, este año he sido muy bueno y me gustaría pedirte una muñeca o un patinete. ¡Gracias, Santa!");
array_push($cartas, "Hola Santa, ¡este año me encantaría una videoconsola o una bicicleta!. Espero que puedas traerlo. ¡Gracias!");
array_push($cartas, "Querido Santa, este año quiero tener una videoconsola o un patinete, espero que te portes bien gordo.");
array_push($cartas, "Hola Santa Claus, para esta Navidad me gustaría que me trajeras una guitarra o un patinete. ¡Gracias por cumplir sueños!");
array_push($cartas, "Hola Santa, te odio tonto porque nunca aciertas... ¡y tienes el culo muy gordo!");

/**
 * CREAR UNA INSTANCIA DE LA CLASE ListaDeDeseos Y CalculadoraNavidad
 */
$palabrasProhibidas = ["culo", "feo", "gordo", "tonto"];
$regalosDisponibles = ["videoconsola" => 599.90, "libro" => 19.50, "calcetines" => 4.99, "bicicleta" => 299.99, "patinete" => 499.99, "muñeca" => 14.99];

$listaDeDeseos = new ListaDeDeseos($palabrasProhibidas, $regalosDisponibles);

$calculadora = new CalculadoraDeNavidad();

/**
 * AGREGAR CARTAS DE EJEMPLO
 */
foreach($cartas as $carta){
    $listaDeDeseos->agregarCarta($carta);
}

/**
 * CALCULAR DISTRIBUCIÓN DE REGALOS
 */
$totalCasas = count($cartas); // Se obtiene el total de casas donde se van a repartir los regalos
$totalRegalos = $totalCasas*3 + mt_rand(0, $totalCasas-1); // Se simula el número de regalos disponibles a repartir
$asignaciónDeRegalos = $calculadora->calcularRegalosPorCasa($totalRegalos, $totalCasas);

/**
 * CALCULAR REPARTO DE REGALOS
 * Calcula el reparto de los regalos a las casas, el resultado es un array bidimensional, donde para cada casa (índice del array principal) se almacena un sub-array
 * que contiene los regalos (strings) asociados a cada casa
 */
$repartoDeRegalos = $calculadora->repartirRegalos($asignaciónDeRegalos, $listaDeDeseos);

/**
 * OBTENER ANÁLISIS DEL ÉXITO DEL REPARTO DE REGALOS
 * Se realiza un análisis del reparto de regalos realizado, el resultado es un array indexado de booleanos, cada índice representa una casa
 */
$analisisDelReparto = $listaDeDeseos->analisisReparto($repartoDeRegalos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Cartas Navideñas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>

<h1>Gestor de Cartas Navideñas</h1>

<h2>Cartas Recibidas</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Carta</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listaDeDeseos->obtenerCartas() as $index => $carta): ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= $carta; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Distribución de Regalos por Casas</h2>
<ul>
    <?php foreach($asignaciónDeRegalos as $index => $numRegalos) { ?>
        <li><b>Casa <?= $index+1 ?>:</b> Le pertenecen <?= $numRegalos ?> regalos</li>
    <?php } ?>
</ul>

<h2>Reparto de regalos</h2>
<table>
    <thead>
        <tr>
            <th>Casa</th>
            <th>Regalos</th>
            <th>Coste</th>
            <th>Acierto</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($repartoDeRegalos); $i++) { ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= implode(", ", $repartoDeRegalos[$i]); ?></td>
                <td><?= $calculadora->calcularCosteRegalos($repartoDeRegalos[$i], $listaDeDeseos) ?> €</td>
                <td><?= ($analisisDelReparto[$i])?"Sí":"No"; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php $calculadora->mostrarEstadísticas($repartoDeRegalos, $analisisDelReparto); ?>

</body>
</html>

