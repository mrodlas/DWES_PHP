<?php
$message = '';
$message_error = '';
$fecha = [
    'fecha_inicio' => '',
    'fecha_fin' => ''
];
$error = [
    'fecha_inicio' => '',
    'fecha_fin' => '',
    'frecuencia' => '',
];

$opciones_validas = ["diaria", "semanal", "dos-semanas", "mensual"];
$frecuencia = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters['fecha_inicio']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_inicio']['options']['regexp'] = '/[0-9\/\:\s]/';
    $filters['fecha_fin']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_fin']['options']['regexp'] = '/[0-9\/\:\s]/';

    $fecha = filter_input_array(INPUT_POST, $filters);

    if (isset($_POST["frecuencia"]) && in_array($_POST["frecuencia"], $opciones_validas)) {
        $frecuencia = $_POST["frecuencia"];
    }

    $error = [
        'fecha_inicio' => ($fecha['fecha_inicio']) ? '' : 'Error en la fecha de inicio',
        'fecha_fin' => ($fecha['fecha_fin']) ? '' : 'Error en la fecha de finalización',
        'frecuencia' => ($frecuencia !== '' && in_array($frecuencia, $opciones_validas)) ? '' : 'Error en la frecuencia seleccionada'
    ];

    $invalid = implode($error);

    if ($invalid) {
        $message_error = 'Debes solucionar los errores.';
    } else {
        // Los datos son válidos, realizar aqui los ejercicios propuestos
        $fecha_inicio = new DateTime($fecha['fecha_inicio']);
        $fecha_fin = new DateTime($fecha['fecha_fin']);
        $fechas_reuniones = [];
        
        // Generar las fechas de las reuniones
        while ($fecha_inicio <= $fecha_fin) {
            $fechas_reuniones[] = $fecha_inicio->format('Y-m-d H:i:s');
            
            // Incrementar la fecha según la frecuencia
            switch ($frecuencia) {
                case 'diaria':
                    $fecha_inicio->modify('+1 day');
                    break;
                case 'semanal':
                    $fecha_inicio->modify('+1 week');
                    break;
                case 'dos-semanas':
                    $fecha_inicio->modify('+2 weeks');
                    break;
                case 'mensual':
                    $fecha_inicio->modify('+1 month');
                    break;
            }
        }

        // Calcular el tiempo restante hasta cada reunión
        $now = new DateTime();
        $resultados = [];

        foreach ($fechas_reuniones as $fecha_reunion) {
            $fecha_reunion_dt = new DateTime($fecha_reunion);
            $intervalo = $now->diff($fecha_reunion_dt);
            $tiempo_restante = sprintf('%d días, %d horas, %d minutos', 
                $intervalo->d, 
                $intervalo->h, 
                $intervalo->i
            );

            $resultados[] = [
                'fecha' => $fecha_reunion,
                'tiempo_restante' => $tiempo_restante
            ];
        }

        // Mostrar resultados
        $message = '<h2>Fechas de Reuniones Generadas</h2>';
        foreach ($resultados as $resultado) {
            $message .= '<p>Reunión: ' . $resultado['fecha'] . ' - Tiempo restante: ' . $resultado['tiempo_restante'] . '</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Reuniones</title>
</head>
<body>
    <h1>Generador de Reuniones</h1>
    <form method="POST">
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="datetime-local" name="fecha_inicio" required>
        
        <label for="fecha_fin">Fecha de Fin:</label>
        <input type="datetime-local" name="fecha_fin" required>
        
        <label for="frecuencia">Frecuencia:</label>
        <select name="frecuencia" required>
            <option value="diaria">Diaria</option>
            <option value="semanal">Semanal</option>
            <option value="dos-semanas">Cada dos semanas</option>
            <option value="mensual">Mensual</option>
        </select>
        
        <button type="submit">Generar Reuniones</button>
    </form>

    <?php if ($message_error): ?>
        <div style="color: red;"><?php echo $message_error; ?></div>
    <?php endif; ?>

    <?php if ($message): ?>
        <div><?php echo $message; ?></div>
    <?php endif; ?>
</body>
</html>
