<?php
require 'Vars_and_Functions.php';

include 'Includes/Header.php';
?>
<section class="pantalla">
    <h1 class="titulo">Generador de reuniones</h1>
</section>
<section>
    <p><?= $message_error ?></p>
    <form class="formulario" action="Index.php" method="POST">
        <label>Introduce la fecha inicio: </label>
        <input type="text" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha en formato (01/01/2020 23:00:00)" maxlength="21" pattern="[0-9\/\:\s]+" size="32" value="<?= htmlspecialchars($fecha['fecha_inicio']) ?>" required /><br>
        <span class="error"><?= $error['fecha_inicio'] ?></span><br>
        
        <label>Introduce la fecha de finalización: </label>
        <input type="text" name="fecha_fin" id="fecha_fin" placeholder="Fecha en formato (01/01/2020 23:00:00)" maxlength="21" pattern="[0-9\/\:\s]+" size="32" value="<?= htmlspecialchars($fecha['fecha_fin']) ?>" required /><br>
        <span class="error"><?= $error['fecha_fin'] ?></span><br>

        <label for="frecuencia">Selecciona la frecuencia:</label>
        <select id="frecuencia" name="frecuencia">
            <option value="diaria" <?= ($frecuencia == 'diaria') ? 'selected' : '' ?>>Diaria</option>
            <option value="semanal" <?= ($frecuencia == 'semanal') ? 'selected' : '' ?>>Semanal</option>
            <option value="dos-semanas" <?= ($frecuencia == 'dos-semanas') ? 'selected' : '' ?>>Dos semanas</option>
            <option value="mensual" <?= ($frecuencia == 'mensual') ? 'selected' : '' ?>>Mensual</option>
        </select>
        <span class="error"><?= $error['frecuencia'] ?></span><br><br>

        <input type="submit" value="Enviar" name="enviar" id="enviar" />
        <br><br>
        <p><?= $message ?></p>
    </form>

    <?php if (!empty($fechas_reuniones_por_zona)): ?>
        <h2>Fechas de reuniones generadas por zona horaria:</h2>
        <?php foreach ($fechas_reuniones_por_zona as $zona => $fechas): ?>
            <h3><?= $zona ?></h3>
            <ul>
                <?php foreach ($fechas as $fecha_reunion): ?>
                    <li><?= $fecha_reunion->format('d/m/Y H:i:s') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>

</section>

<?php include 'Includes/Footer.php'; ?>
