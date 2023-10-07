<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cantidad_notas = $_POST['cantidad_notas'];
        $nombre_materia = $_POST['nombre_materia'];
        $calificacion_minima = $_POST['calificacion_minima'];
        $calificacion_maxima = $_POST['calificacion_maxima'];

        $suma_notas = 0;

        for ($i = 1; $i <= $cantidad_notas; $i++) {
            $nota = floatval( $_POST['nota' . $i]);

            if ($nota < $calificacion_minima || $nota > $calificacion_maxima) {
                echo "La nota $i no está dentro del rango de calificaciones.";
            } else {
                $suma_notas += $nota;
            }
        }

        $promedio = $suma_notas / $cantidad_notas;
        echo "El promedio de la materia $nombre_materia es: $promedio";
    }
?>