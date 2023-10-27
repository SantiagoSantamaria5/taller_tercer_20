<?php
namespace App\controllers;
use taller_terrcer_20\controllers\database\DatabaseController;
// la clase abstracta hace el poder definir otras class para hacer la herencia
    abstract class EntityController{
        public abstract function allData();
        //En getItem su contexto en SQL select * from where codigo=".$value";
        public abstract function getItem($pk);
        public abstract function addItem($model);
        public abstract function updateItem($model);
        public abstract function deleteItem($pk);
//exec = ejecutar y el protected = es un metodo para poder hacerlo dentro 
//de la clase, pero ademas de poder usarlo en otra clase para una herencia
        protected function execSql($sql){
            $dbcontroller =  new DatabaseController();
            return $dbcontroller->execSql($sql);
        }
    }
?>