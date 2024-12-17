<?php
class Hamburgueseria {
    private $nombre = "HamburPHPuesa";
    private $ventas = [];
    private $carta = [
        "Hamburguesa Clásica" => 5.50,
        "Hamburguesa con Queso" => 6.75,
        "Hamburguesa BBQ" => 7.25,
        "Hamburguesa Vegetariana" => 6.00
    ];

    // GETTERS
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCarta(): array {
        return $this->carta;
    }

    public function getVentas(): array {
        return $this->ventas;
    }

    // MÉTODOS

    // 1. Generar cantidad de ventas aleatorias
    public function generarCantidadVentas(): int {
        return mt_rand(50, 100);
    }

    // 2. Generar ventas aleatorias (hamburguesas y cantidades)
    public function generarVentas(): void {
        $cantidadVentas = $this->generarCantidadVentas();
        $carta = $this->getCarta();

        for ($i = 0; $i < $cantidadVentas; $i++) {
            $hamburguesa = array_rand($carta); // Seleccionar una hamburguesa al azar
            $cantidad = mt_rand(1, 5); // Cantidad aleatoria entre 1 y 5

            if (isset($this->ventas[$hamburguesa])) {
                $this->ventas[$hamburguesa] += $cantidad;
            } else {
                $this->ventas[$hamburguesa] = $cantidad;
            }
        }
    }

    // 3. Calcular el total de cada tipo de hamburguesa
    public function calcularTotalesPorHamburguesa(): array {
        $totales = [];
        foreach ($this->ventas as $hamburguesa => $cantidad) {
            $precioUnitario = $this->carta[$hamburguesa];
            $totales[$hamburguesa] = round($precioUnitario * $cantidad, 2);
        }
        return $totales;
    }

    // 4. Calcular el total del día
    public function calcularTotalDia(): string {
        $totalesPorHamburguesa = $this->calcularTotalesPorHamburguesa();
        $totalDia = array_sum($totalesPorHamburguesa);
        return number_format($totalDia, 2, ',', ' ');
    }

    // 5. Calcular estadísticas
    public function calcularEstadisticas(): string {
        $totalFormateado = $this->calcularTotalDia();
        $totalSinFormato = (float) str_replace(',', '.', str_replace(' ', '', $totalFormateado));

        // Validar si es numérico
        if (!is_numeric($totalSinFormato)) {
            return "<p>Error al calcular estadísticas: El total no es numérico.</p>";
        }

        // Cálculos solicitados
        $raizCuadrada = sqrt($totalSinFormato);
        $potencia = pow($totalSinFormato, 2);
        $redondeadoArriba = ceil($totalSinFormato);
        $redondeadoAbajo = floor($totalSinFormato);

        // Formatear resultados
        $resultado = "
        <ul>
            <li><b>Total del día:</b> $totalFormateado €</li>
            <li><b>Raíz cuadrada del total:</b> " . round($raizCuadrada, 2) . "</li>
            <li><b>Total elevado a la potencia de 2:</b> " . round($potencia, 2) . "</li>
            <li><b>Redondeado hacia arriba:</b> $redondeadoArriba</li>
            <li><b>Redondeado hacia abajo:</b> $redondeadoAbajo</li>
        </ul>";

        return $resultado;
    }
}

// Crear instancia de Hamburgueseria
$hamburgueseria = new Hamburgueseria();
$hamburgueseria->generarVentas();
$totalesPorHamburguesa = $hamburgueseria->calcularTotalesPorHamburguesa();
$totalDia = $hamburgueseria->calcularTotalDia();
$estadisticas = $hamburgueseria->calcularEstadisticas();
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Mostrar el nombre de la hamburguesería -->
<h1><?= htmlspecialchars($hamburgueseria->getNombre()) ?></h1>

<!-- Mostrar el total del día -->
<h2>Total del día: <?= $totalDia ?> €</h2>

<!-- Mostrar ventas por tipo de hamburguesa -->
<h3>Ventas por tipo de hamburguesa:</h3>
<ul>
    <?php foreach ($hamburgueseria->getVentas() as $hamburguesa => $cantidad): ?>
        <li>
            <b><?= htmlspecialchars($hamburguesa) ?>:</b> <?= $cantidad ?> unidades vendidas |
            Total: <?= $totalesPorHamburguesa[$hamburguesa] ?> €
        </li>
    <?php endforeach; ?>
</ul>

<!-- Mostrar estadísticas -->
<h3>Estadísticas del día:</h3>
<?= $estadisticas ?>

<?php include './includes/footer.php'; ?>
