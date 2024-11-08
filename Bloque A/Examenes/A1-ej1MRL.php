<?php
//ARRAY PARA ALMACENAR LOS DATOS PERSONALES DE CADA ESTUDIANTE
$datos_estudiante = [
    ['nombre' => 'Alex García', 'fecha' => '14-03-2005', 'lugar_residencia' => 'Madrid', 'n_telefono' => '698997763', 'correo' => 'alex.garcia@example.com', 'repetidor' => 'no'],
    ['nombre' => 'Maria López', 'fecha' => ' 20-05-2005', 'lugar_residencia' => 'Barcelona', 'n_telefono' => '612321147', 'correo' => ' maria.lopez@example.com', 'repetidor' => 'si'],
    ['nombre' => 'Juan Pérez', 'fecha' => '08-11-2004', 'lugar_residencia' => 'Sevilla', 'n_telefono' => '677998844', 'correo' => ' juan.perez@example.com', 'repetidor' => 'no'],
    ['nombre' => 'Lucía Sánchez', 'fecha' => '22-09-2005', 'lugar_residencia' => 'Valencia', 'n_telefono' => '664889977', 'correo' => 'lucia.sanchez@example.com', 'repetidor' => 'si'],
    ['nombre' => 'Carlos Martinez', 'fecha' => '05-01-2005', 'lugar_residencia' => 'Zaragoza', 'n_telefono' => '618997755', 'correo' => 'carlos.martinez@example.com', 'repetidor' => 'no'],

];
//ARRAY PARA ALMACENAR LAS CALIFICACIONES DE CADA MATERIA CORRESPONDIENTE A CADA ESTUDIANTE
//CALCULAREMOS LA MEDIA SEGUN LOS CRITERIOS DE CADA ASIGNATURA
$calificaciones = [
    ['nota_matematicas' => (6+7+8+6+7)/5, 'nota_lengua' => (((5+6)/2)*0.4) + (7*0.6), 'nota_ingles' => (6+7+6+6)/4, 'nota_tecnologia' => (8*0.8)+(7*0.2)],
    ['nota_matematicas' => (5+6+7+6+7)/5, 'nota_lengua' => (((6+5)/2)*0.4) + (7*0.6), 'nota_ingles' => (6+6+5+6)/4, 'nota_tecnologia' => (6*0.8)+(7*0.2)],
    ['nota_matematicas' => (7+6+8+7+7)/5, 'nota_lengua' => (((6+7)/2)*0.4) + (6*0.6), 'nota_ingles' => (7+6+7+6)/4, 'nota_tecnologia' => (8*0.8)+(6*0.2)],
    ['nota_matematicas' => (4+5+4+3+4)/5, 'nota_lengua' => (((5+5)/2)*0.4) + (6*0.6), 'nota_ingles' => (4+4+5+4)/4, 'nota_tecnologia' => (5*0.8)+(4*0.2)],
    ['nota_matematicas' => (5+4+5+4+5)/5, 'nota_lengua' => (((4+4)/2)*0.4) + (5*0.6), 'nota_ingles' => (5+4+4+4)/4, 'nota_tecnologia' => (4*0.8)+(5*0.2)],

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Sistema de evaluación de estudiantes</h1>
    <h2>Datos personales</h2>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LOS DATOS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->
    <p>
        <h3>Estudiante 1: <?php echo $datos_estudiante[0]['nombre']; ?> </h3><br> 
        Fecha de nacimiento: <?php echo $datos_estudiante[0]['fecha']; ?> <br> 
        Lugar de residencia: <?php echo $datos_estudiante[0]['lugar_residencia']; ?> <br> 
        Número de teléfono: <?php echo $datos_estudiante[0]['n_telefono']; ?> <br>
        Correo electrónico: <?php echo $datos_estudiante[0]['correo']; ?> <br>
        Estado de repetidor: <?php echo $datos_estudiante[0]['repetidor']; ?> <br>
        El/La estudiante ha aprobado
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LAS NOTAS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <h2>Evaluaciones: </h2>
    <p>
        Matematicas: <?php echo $calificaciones[0]['nota_matematicas']; ?><br>
        Lengua: <?php echo $calificaciones[0]['nota_lengua']; ?><br>
        Ingles: <?php echo $calificaciones[0]['nota_ingles']; ?><br>
        Tecnología: <?php echo $calificaciones[0]['nota_tecnologia']; ?><br>
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LOS DATOS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <p>
        <h3>Estudiante 2: <?php echo $datos_estudiante[1]['nombre']; ?> </h3><br> 
        Fecha de nacimiento: <?php echo $datos_estudiante[1]['fecha']; ?> <br> 
        Lugar de residencia: <?php echo $datos_estudiante[1]['lugar_residencia']; ?> <br> 
        Número de teléfono: <?php echo $datos_estudiante[1]['n_telefono']; ?> <br>
        Correo electrónico: <?php echo $datos_estudiante[1]['correo']; ?> <br>
        Estado de repetidor: <?php echo $datos_estudiante[1]['repetidor']; ?> <br>
        El/La estudiante ha aprobado
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LAS NOTAS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <h2>Evaluaciones: </h2>
    <p>
        Matematicas: <?php echo $calificaciones[1]['nota_matematicas']; ?><br>
        Lengua: <?php echo $calificaciones[1]['nota_lengua']; ?><br>
        Ingles: <?php echo $calificaciones[1]['nota_ingles']; ?><br>
        Tecnología: <?php echo $calificaciones[1]['nota_tecnologia']; ?><br>
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LOS DATOS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <p>
        <h3>Estudiante 3: <?php echo $datos_estudiante[2]['nombre']; ?> </h3><br> 
        Fecha de nacimiento: <?php echo $datos_estudiante[2]['fecha']; ?> <br> 
        Lugar de residencia: <?php echo $datos_estudiante[2]['lugar_residencia']; ?> <br> 
        Número de teléfono: <?php echo $datos_estudiante[2]['n_telefono']; ?> <br>
        Correo electrónico: <?php echo $datos_estudiante[2]['correo']; ?> <br>
        Estado de repetidor: <?php echo $datos_estudiante[2]['repetidor']; ?> <br>
        El/La estudiante ha aprobado
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LAS NOTAS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <h2>Evaluaciones: </h2>
    <p>
        Matematicas: <?php echo $calificaciones[2]['nota_matematicas']; ?><br>
        Lengua: <?php echo $calificaciones[2]['nota_lengua']; ?><br>
        Ingles: <?php echo $calificaciones[2]['nota_ingles']; ?><br>
        Tecnología: <?php echo $calificaciones[2]['nota_tecnologia']; ?><br>
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LOS DATOS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <p>
        <h3>Estudiante 4: <?php echo $datos_estudiante[3]['nombre']; ?> </h3><br> 
        Fecha de nacimiento: <?php echo $datos_estudiante[3]['fecha']; ?> <br> 
        Lugar de residencia: <?php echo $datos_estudiante[3]['lugar_residencia']; ?> <br> 
        Número de teléfono: <?php echo $datos_estudiante[3]['n_telefono']; ?> <br>
        Correo electrónico: <?php echo $datos_estudiante[3]['correo']; ?> <br>
        Estado de repetidor: <?php echo $datos_estudiante[3]['repetidor']; ?> <br>
        El/La estudiante ha suspendido
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LAS NOTAS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <h2>Evaluaciones: </h2>
    <p>
        Matematicas: <?php echo $calificaciones[3]['nota_matematicas']; ?><br>
        Lengua: <?php echo $calificaciones[3]['nota_lengua']; ?><br>
        Ingles: <?php echo $calificaciones[3]['nota_ingles']; ?><br>
        Tecnología: <?php echo $calificaciones[3]['nota_tecnologia']; ?><br>
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LOS DATOS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <p>
        <h3>Estudiante 5: <?php echo $datos_estudiante[4]['nombre']; ?> </h3><br> 
        Fecha de nacimiento: <?php echo $datos_estudiante[4]['fecha']; ?> <br> 
        Lugar de residencia: <?php echo $datos_estudiante[4]['lugar_residencia']; ?> <br> 
        Número de teléfono: <?php echo $datos_estudiante[4]['n_telefono']; ?> <br>
        Correo electrónico: <?php echo $datos_estudiante[4]['correo']; ?> <br>
        Estado de repetidor: <?php echo $datos_estudiante[4]['repetidor']; ?> <br>
        El/La estudiante ha suspendido
    </p>
<!--PARRAFO QUE MUESTRA LA INFORMACIÓN DE LAS NOTAS DE LOS ESTUDIANTES UN POCO ESQUEMATIZADA-->

    <h2>Evaluaciones: </h2>
    <p>
        Matematicas: <?php echo $calificaciones[4]['nota_matematicas']; ?><br>
        Lengua: <?php echo $calificaciones[4]['nota_lengua']; ?><br>
        Ingles: <?php echo $calificaciones[4]['nota_ingles']; ?><br>
        Tecnología: <?php echo $calificaciones[4]['nota_tecnologia']; ?><br>
    </p>

</body>
</html>