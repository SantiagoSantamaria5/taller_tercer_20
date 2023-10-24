<?php
//el namespace es la ruta para poder imporatar una carpeta para el proyecto
namespace EstudianteApp\Controllers\Database;
use mysqli;

class DatabaseController{
    private $DB_HOST = 'localhost';
        private $DB_USER = 'root';
        private $DB_PWD = '';
        private $DB_NAME = 'estudiante';
        private $conx;

        function __construct()
        {
        $this->conx = new mysqli(
            $this->DB_HOST,
            $this->DB_USER,
            $this->DB_PWD,
            $this->DB_NAME
        );
    }

    function execSql($sql){
        $result = $this->conx->query($sql);
        $this->conx ->close();
        return $result;
    }
}
?>