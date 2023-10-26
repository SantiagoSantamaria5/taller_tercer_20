<?php
$cantidad_notas = '';
$calificacion_maxima = '';
$calificacion_minima = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = false;

    if (isset($_POST["cantidad_notas"]) && isset($_POST["calificacion_maxima"]) && isset($_POST["calificacion_minima"])) {
        $cantidad_notas = intval($_POST["cantidad_notas"]);
        $calificacion_maxima = floatval($_POST["calificacion_maxima"]);
        $calificacion_minima = floatval($_POST["calificacion_minima"]);

        if ($cantidad_notas > 0) {
            echo '<form method="post">';
            echo '<label for="calificacion_maxima">Calificación Máxima:</label>';
            echo '<input type="text" name="calificacion_maxima" id="calificacion_maxima" value="' . $calificacion_maxima . '"><br>';
            echo '<label for="calificacion_minima">Calificación Mínima:</label>';
            echo '<input type="text" name="calificacion_minima" id="calificacion_minima" value="' . $calificacion_minima . '"><br>';

            for ($i = 1; $i <= $cantidad_notas; $i++) {
                echo '<label for="nota' . $i . '">Nota ' . $i . ':</label>';
                echo '<input type="text" name="nota' . $i . '" id="nota' . $i . '"><br>';
            }
            echo '<input type="hidden" value="' . $cantidad_notas . '" name="cantidad_notas">';
            echo '<input type="submit" value="Calcular">';
            echo '</form>';
        } else {
            echo "La cantidad de notas debe ser mayor que cero.";
        }
    }

    if (isset($_POST["nota1"])) {
        $sum_notas = 0;
        $error = false;

        for ($i = 1; $i <= $cantidad_notas; $i++) {
            $nota = isset($_POST['nota' . $i]) && is_numeric($_POST['nota' . $i]) ? floatval($_POST['nota' . $i]) : 0;

            if ($nota < $calificacion_minima || $nota > $calificacion_maxima) {
                echo "La nota $i no está dentro del rango de calificaciones.";
                $error = true;
                break;
            } else {
                $sum_notas += $nota;
            }
        }

        if (!$error) {
            $promedio = $sum_notas / $cantidad_notas;
            $promedio_deseado = $calificacion_maxima / 2;
            $promedio_deseado= $promedio_deseado + 0.5;

            if ($promedio >= $promedio_deseado) {
                echo "El promedio de las notas es: $promedio. El estudiante pasa.";
            } else {
                echo "El promedio de las notas es: $promedio. El estudiante pierde.";
            }
        }
    }
}
?>
