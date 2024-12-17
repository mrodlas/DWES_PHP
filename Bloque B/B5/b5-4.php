<?php
// Datos de entrada
$data = [
    "maria.smith@correo.com",
    "peter-parker@dailybugle.net",
    "correo-invalido@dominio",
    "111-222-3333",
    "444.555.6666",
    "http://www.miweb.com",
    "https://blog.site.net/articulo/123",
    "esto-no-es-una-url"
];

// 1. PREG_MATCH -> Validación de correos electrónicos
$emailRegex = '/^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,7}$/i'; // Acepta dominios de hasta 7 caracteres
$correosValidos = [];

foreach ($data as $item) {
    if (preg_match($emailRegex, $item)) {
        $correosValidos[] = $item;
    }
}

// 2. PREG_MATCH_ALL -> Extracción de números de teléfono (Formato xxx-xxx-xxxx o xxx.xxx.xxxx)
$phoneRegex = '/\b\d{3}[-.]\d{3}[-.]\d{4}\b/';
$numerosValidos = [];

foreach ($data as $item) {
    if (preg_match_all($phoneRegex, $item, $coincidencias)) {
        foreach ($coincidencias[0] as $telefono) {
            $numerosValidos[] = $telefono;
        }
    }
}

// 3. PREG_SPLIT -> División de URLs en protocolo, dominio y ruta
$urlRegex = '/[\/:?]/'; // Divide por "/", ":", y "?"
$urlsValidas = [];

foreach ($data as $item) {
    $componentes = preg_split($urlRegex, $item, -1, PREG_SPLIT_NO_EMPTY);
    if (count($componentes) >= 2 && in_array($componentes[0], ['http', 'https'])) {
        $ruta = implode('/', array_slice($componentes, 2)); // Reconstruir la ruta
        $urlsValidas[] = [
            'protocolo' => $componentes[0],
            'dominio' => $componentes[1],
            'ruta' => $ruta ? $ruta : 'N/A'
        ];
    }
}

// 4. PREG_REPLACE -> Limpieza de correos inválidos
$datosLimpios = [];

foreach ($data as $item) {
    // Reemplaza el correo electrónico si no es válido
    $datosLimpios[] = preg_replace($emailRegex, '', $item);
}
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Correos Electrónicos Válidos</h2>
<ul>
    <?php foreach ($correosValidos as $correo) : ?>
        <li><?= htmlspecialchars($correo) ?></li>
    <?php endforeach; ?>
</ul>

<h2>Números de Teléfono Válidos</h2>
<ul>
    <?php foreach ($numerosValidos as $telefono) : ?>
        <li><?= htmlspecialchars($telefono) ?></li>
    <?php endforeach; ?>
</ul>

<h2>URLs Válidas</h2>
<ul>
    <?php foreach ($urlsValidas as $url) : ?>
        <li>
            <ul>
                <li>Protocolo: <?= htmlspecialchars($url['protocolo']) ?></li>
                <li>Dominio: <?= htmlspecialchars($url['dominio']) ?></li>
                <li>Ruta: <?= htmlspecialchars($url['ruta']) ?></li>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Datos Limpiados</h2>
<ul>
    <?php foreach ($datosLimpios as $dato) : ?>
        <?php if (!empty(trim($dato))) : ?>
            <li><?= htmlspecialchars($dato) ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php include './includes/footer.php'; ?>
