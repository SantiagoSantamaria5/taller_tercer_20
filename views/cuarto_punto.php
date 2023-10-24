<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Docentes y Cursos</title>
</head>

<body>
    <h1>Gestión de Docentes</h1>
    <form action="docentes.php" method="post">
        Código: <input type="text" name="codigo_docente"><br>
        Nombre: <input type="text" name="nombre_docente"><br>
        Ocupación:
        <select name="ocupacion_docente">
            <!-- Aquí debes cargar las ocupaciones desde la base de datos -->
        </select><br>
        <input type="submit" name="submit_docente" value="Registrar Docente">
    </form>

    <h1>Gestión de Cursos</h1>
    <form action="cursos.php" method="post">
        Código: <input type="text" name="codigo_curso"><br>
        Nombre: <input type="text" name="nombre_curso"><br>
        Docente:
        <select name="docente_curso">
            <!-- Aquí debes cargar los docentes desde la base de datos -->
        </select><br>
        <input type="submit" name="submit_curso" value="Registrar Curso">
        <a href="../index.html">
            <button>VOLVER</button>
        </a>
        </div>
    </form>
</body>
</html>