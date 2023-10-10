<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $cantidad_notas = (isset($_POST['cantidad_notas']) && is_numeric($_POST['cantidad_notas'])) ? intval($_POST['cantidad_notas']) : 0;
    $nombre_materia = $_POST['nombre_materia'] ?? '';
    $calificacion_minima = (isset($_POST['calificacion_minima']) && is_numeric($_POST['calificacion_minima'])) ? floatval($_POST['calificacion_minima']) : 0;
    $calificacion_maxima = (isset($_POST['calificacion_maxima']) && is_numeric($_POST['calificacion_maxima'])) ? floatval($_POST['calificacion_maxima']) : 0;

    $suma_notas = 0;
    $error = false;

    for ($i = 1; $i <= $cantidad_notas; $i++) {
        $nota = (isset($_POST['nota' . $i]) && is_numeric($_POST['nota' . $i])) ? floatval($_POST['nota' . $i]) : 0;

        if ($nota < $calificacion_minima || $nota > $calificacion_maxima) {
            echo "La nota $i no está dentro del rango de calificaciones.";
            $error = true;
            break;
        } else {
            $suma_notas += $nota;
        }
    }

    if (!$error) {
        $promedio = ($cantidad_notas > 0) ? ($suma_notas / $cantidad_notas) : 0;
        echo "El promedio de la materia $nombre_materia es: $promedio";
    }
}
?>
