<?php
include __DIR__.'/../models/estudiantesYprofes.php';
include __DIR__.'/../controllers/entityController.php';
include __DIR__.'/../controllers/database/databaseController.php';
include __DIR__.'/../controllers/estudiantesYprofes/estudianteController.php';
include __DIR__.'/../controllers/estudiantesYprofes/docenteController.php';

use App\models\Cursos;
use App\models\Docente;
use App\controllers\estudiantesYprofes\EstudianteController;

$operacion = $_POST['operacion'];
$resultado = '';
$estudianteController = new EstudianteController();

if($operacion == 'delete'){
    $resultado = $estudianteController->deleteItem($_POST['cod_docente']);
}else{
    $cursos = new Cursos();
    $estudiante->set('cod', $_POST['cod']);
    $estudiante->set('nombre', $_POST['nombre']);
    $estudiante->set('cod_docente', $_POST['cod_docente']);
    $resultado = $operacion=='update'
        ? $estudianteController->updateItem($estudiante)
        : $estudianteController->addItem($estudiante);
}

$operacion = $_POST['operacion'];
$resultado = '';
$estudianteController = new EstudianteController();

if($operacion == 'delete'){
    $resultado = $docenteController->deleteItem($_POST['idOcupacion']);
}else{
    $docentes = new Docente();
    $docentes->set('cod', $_POST['cod']);
    $docentes->set('nombre', $_POST['nombre']);
    $docentes->set('idOcupacion', $_POST['idOcupacion']);
    $resultado = $operacion=='update'
        ? $docenteController->updateItem($docentes)
        : $docenteController->addItem($docentes);
}


// si $resultado == true -> guarda el registro;
// estudiar el metodo de addItem para hacer el insert en la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $resultado;
    ?>
    <a href="../index.php">Ir al inico</a>
</body>
</html>