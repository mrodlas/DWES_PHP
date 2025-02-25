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
        $formato = 'd/m/Y H:i:s';
        $inicio = DateTime::createFromFormat($formato, $fecha['fecha_inicio']);
        $fin = DateTime::createFromFormat($formato, $fecha['fecha_fin']);

        if (!$inicio || !$fin) {
            $message_error = 'Las fechas no tienen un formato válido.';
        } else {
            // Definir el intervalo según la frecuencia seleccionada
            switch ($frecuencia) {
                case 'diaria':
                    $intervalo = new DateInterval('P1D'); // Periodo de 1 Dia
                    break;
                case 'semanal':
                    $intervalo = new DateInterval('P1W'); // Periodo de 1 Semana
                    break;
                case 'dos-semanas':
                    $intervalo = new DateInterval('P2W'); // Periodo de 2 Semanas
                    break;
                case 'mensual':
                    $intervalo = new DateInterval('P1M'); // Periodo de 1 Mes
                    break;
            }

            // Generar fechas de reuniones manualmente
            $fechas_reuniones = [];
            $tempFecha = clone $inicio;
            while ($tempFecha <= $fin) {
                $fechas_reuniones[] = clone $tempFecha;
                $tempFecha->add($intervalo);
            }

            // Zonas horarias requeridas
            $zonas = [
                'Madrid' => 'Europe/Madrid',
                'Los Ángeles' => 'America/Los_Angeles',
                'Londres' => 'Europe/London',
                'Tokio' => 'Asia/Tokyo'
            ];

            // Lógica para generar las fechas de reuniones según las zonas horarias
            $fechas_reuniones_por_zona = []; // Array para almacenar las fechas por zona
            foreach ($zonas as $zona => $zona_horaria) {
                $fechas_reuniones_zona = [];
                foreach ($fechas_reuniones as $fecha_reunion) {
                    // Clonar la fecha original y establecer la zona horaria
                    $fecha_reunion_zona = clone $fecha_reunion;
                    $fecha_reunion_zona->setTimezone(new DateTimeZone($zona_horaria));
                    $fechas_reuniones_zona[] = $fecha_reunion_zona;
                }
                $fechas_reuniones_por_zona[$zona] = $fechas_reuniones_zona; // Almacenar las fechas por zona
            }
        }
    }
}
