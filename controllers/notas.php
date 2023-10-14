<?php

$calificacion_maxima = '';
$calificacion_minima = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre_materia = $_POST['nombre_materia'] ?? '';
    $cantidad_notas = (isset($_POST['cantidad_notas']) && is_numeric($_POST['cantidad_notas'])) ? intval($_POST['cantidad_notas']) : 0;
    $calificacion_minima = (isset($_POST['calificacion_minima']) && is_numeric($_POST['calificacion_minima'])) ? floatval($_POST['calificacion_minima']) : 0;
    $calificacion_maxima = (isset($_POST['calificacion_maxima']) && is_numeric($_POST['calificacion_maxima'])) ? floatval($_POST['calificacion_maxima']) : 0;

    $suma_notas = 0;
    $error = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cantidad_notas"])) {
        $cantidad_notas = intval($_POST["cantidad_notas"]);
        
        if ($cantidad_notas > 0) {
            echo '<form method="post">';
            for ($i = 1; $i <= $cantidad_notas; $i++) {
                echo '<label for="nota' . $i . '">Nota ' . $i . ':</label>';
                echo '<input type="text" name="nota' . $i . '" id="nota' . $i . '"><br>';
            
            }
            echo '<input type="submit" value="Calcular">';
            echo '</form>';
            echo "la calificacion minima es :" ,$calificacion_minima = $_POST['calificacion_minima'];
            echo "<br>";
            echo "la calificacion maxima es :" , $calificacion_maxima = $_POST['calificacion_maxima'];
           
        } else {
            echo "La cantidad de notas debe ser mayor que cero.";
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nota1"])) {
        $suma_notas = 0;
        $error = false;
        $calificacion_minima = $_POST['calificacion_minima'] ;
        $calificacion_maxima = $_POST['calificacion_maxima'] ;
    
        for ($i = 1; $i <= $cantidad_notas; $i++) {
            $nota = isset($_POST['nota' . $i]) && is_numeric($_POST['nota' . $i]) ? floatval($_POST['nota' . $i]) : 0;
    
            if ($nota < $calificacion_minima || $nota > $calificacion_maxima) {
                echo "La nota $i no está dentro del rango de calificaciones.";
                $error = true;
                break;
            } else {
                $suma_notas += $nota;
            }
        }
    
        if (!$error) {
            echo "La suma de las notas es: $suma_notas";
        }
    }
}
 ?>
