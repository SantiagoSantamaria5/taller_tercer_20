<?php
// Conexión a la base de datos
$conexion = mysqli_connect("host", "usuario", "contraseña", "basededatos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Manejo del formulario para registrar docentes
if (isset($_POST['submit_docente'])) {
    $codigo = $_POST['codigo_docente'];
    $nombre = $_POST['nombre_docente'];
    $ocupacion = $_POST['ocupacion_docente'];

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO docentes (codigo, nombre, ocupacion_id) VALUES ('$codigo', '$nombre', $ocupacion)";

    if (mysqli_query($conexion, $sql)) {
        echo "Docente registrado correctamente.";
    } else {
        echo "Error al registrar docente: " . mysqli_error($conexion);
    }
}

// Otros manejadores de acciones como actualizar, eliminar y consultar

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
