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
</head>
<body>
<div>
    <a href="../index.html">
    <button>VOLVER</button>
    </a>
    </div>
</body>
</html>
