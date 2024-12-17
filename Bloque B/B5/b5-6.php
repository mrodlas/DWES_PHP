<?php
// Listas de canciones actualizadas
$arrayCanciones = [
    "Save Your Tears" => "The Weeknd",
    "Watermelon Sugar" => "Harry Styles",
    "Physical" => "Dua Lipa",
    "Memories" => "Maroon 5",
    "Clint Eastwood" => "Gorillaz"
];

$arrayCanciones2 = [
    "Heat Waves" => "Glass Animals",
    "Good 4 U" => "Olivia Rodrigo",
    "Shivers" => "Ed Sheeran",
    "Bad Guy" => "Billie Eilish",
    "Montero" => "Lil Nas X",
];

// Funciones: Agregar, Eliminar, Buscar, Verificar, Contar, etc.
// 1. Agregar canción
function agregarCancion(&$arrayCanciones, $titulo, $artista, $posicion)
{
    if (!array_key_exists($titulo, $arrayCanciones)) {
        if ($posicion === "inicio") {
            $arrayCanciones = array_merge([$titulo => $artista], $arrayCanciones);
        } else if ($posicion === "final") {
            $arrayCanciones[$titulo] = $artista;
        }
        return "<div class='alert alert-success'>Canción '$titulo' de '$artista' agregada al $posicion.</div>";
    }
    return "<div class='alert alert-warning'>La canción '$titulo' ya existe en la lista.</div>";
}

// 2. Eliminar canción
function eliminarCancion(&$arrayCanciones, $titulo)
{
    if (array_key_exists($titulo, $arrayCanciones)) {
        unset($arrayCanciones[$titulo]);
        return "<div class='alert alert-danger'>Canción '$titulo' eliminada de la lista.</div>";
    }
    return "<div class='alert alert-warning'>La canción '$titulo' no se encuentra en la lista.</div>";
}

// 3. Mostrar lista
function mostrarLista($arrayCanciones)
{
    $html = "<table class='table table-striped'><thead><tr><th>Título</th><th>Artista</th></tr></thead><tbody>";
    foreach ($arrayCanciones as $titulo => $artista) {
        $html .= "<tr><td>$titulo</td><td>$artista</td></tr>";
    }
    $html .= "</tbody></table>";
    return $html;
}

// 4. Contar canciones
function contarCanciones($arrayCanciones)
{
    return "<div class='alert alert-info'>Número total de canciones: " . count($arrayCanciones) . "</div>";
}

// 5. Fusionar listas
function fusionarListas($array1, $array2)
{
    return array_merge($array1, $array2);
}

// 6. Eliminar duplicados
function eliminarDuplicados($arrayCanciones)
{
    return array_unique($arrayCanciones);
}
?>



<!-- HTML -->
<?php include './includes/header.php'; ?>

<h1 > Mi Lista de Canciones </h1>

<!-- Lista Inicial -->
<h2 >Lista de Canciones</h2>
<?= mostrarLista($arrayCanciones); ?>

<!-- Agregar Canción -->
<h3 >Agregar Canciones</h3>
<?= agregarCancion($arrayCanciones, "Peaches", "Justin Bieber", "final"); ?>
<?= agregarCancion($arrayCanciones, "Blinding Lights", "The Weeknd", "inicio"); ?>
<?= mostrarLista($arrayCanciones); ?>

<!-- Eliminar Canción -->
<h3 >Eliminar Canciones</h3>
<?= eliminarCancion($arrayCanciones, "Clint Eastwood"); ?>
<?= eliminarCancion($arrayCanciones, "Memories"); ?>
<?= mostrarLista($arrayCanciones); ?>

<!-- Contar Canciones -->
<h3 >Contar Canciones</h3>
<?= contarCanciones($arrayCanciones); ?>

<!-- Fusionar Listas -->
<h3 >Fusionar Listas</h3>
<?php
$listaFusionada = fusionarListas($arrayCanciones, $arrayCanciones2);
?>
<?= mostrarLista($listaFusionada); ?>

<!-- Eliminar Duplicados -->
<h3 >Eliminar Duplicados</h3>
<?php
$listaSinDuplicados = eliminarDuplicados($listaFusionada);
?>
<?= mostrarLista($listaSinDuplicados); ?>

<?php include './includes/footer.php'; ?>