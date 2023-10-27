<?php

$numeros = [5, 2, 9, 12, 7, 4, 8, 3];
sort($numeros);
echo "Lista ordenada de menor a mayor: " . implode(", ", $numeros) . "<br>";

$pares = array_filter($numeros, function($numero) {
    return $numero % 2 == 0;
});
rsort($pares);
echo "Lista de números pares ordenada de mayor a menor: " . implode(", ", $pares) . "<br>";

$impares = array_filter($numeros, function($numero) {
    return $numero % 2 != 0;
});
sort($impares);
echo "Lista de números impares ordenada de menor a mayor: " . implode(", ", $impares) . "<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        
        body {
            font-family: Arial, sans-serif;
        }

        .button-container {
            text-align: center;
        }

        .button-container a {
            text-decoration: none;
        }

        .custom-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="button-container">
    <a href="../index.html">
        <button class="custom-button">VOLVER</button>
    </a>
</div>
</body>
</html>

