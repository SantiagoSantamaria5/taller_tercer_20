<?php
// Conexión a la base de datos
$conexion = mysqli_connect("host", "usuario", "contraseña", "basededatos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Manejo del formulario para registrar cursos
if (isset($_POST['submit_curso'])) {
    $codigo = $_POST['codigo_curso'];
    $nombre = $_POST['nombre_curso'];
    $curso= $_POST['curso_curso'];

    // Realizar la inserción en la base de datos
    $sql = "INSERT INTO cursos (codigo, nombre, curso_id) VALUES ('$codigo', '$nombre', $curso)";

    if (mysqli_query($conexion, $sql)) {
        echo "Curso registrado correctamente.";
    } else {
        echo "Error al registrar curso: " . mysqli_error($conexion);
    }
}

// Otros manejadores de acciones como actualizar, eliminar y consultar

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
