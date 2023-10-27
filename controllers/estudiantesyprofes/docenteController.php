<?php

namespace App\controllers\estudiantesYprofes;
use App\controllers\EntityController;
use App\models\Docente;

class DocenteController extends EntityController{
    //getdata
    function allData()
    {
        $sql = "select * from asignaturas2_db";
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $docentes = new Docente();
                $docentes -> set('codigo_docente', $item['cod']);
                $docentes -> set('nombre', $item['nombre']);
                $docentes -> set('idOcupacion', $item['idOcupacion']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                array_push($lista, $docentes);
            }
        }
        return $lista;
    }
    function getItem($docentes){
        $sql = "select * from asignaturas2_db where docentes=".$docentes;
        $resultSQL = $this->execSql($sql);
        $docentes = null;
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $docentes = new Docente();
                $docentes -> get('cod', $item['cod']);
                $docentes -> get('nombre', $item['nombre']);
                $docentes-> get('idOcupacion', $item['idOcupacion']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                break;
            }
        }
        return $docentes;
    }

    function addItem($docentes)
    {
        $cod = $docentes ->get('cod');
        $nombre = $docentes ->get('nombre');
        $idOcupacion = $docentes ->get('idOcupacion');
        $registro = $this->getItem($idOcupacion);
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "Insert into cursos(cod,nombre,cod_docente)value ('$cod','$nombre','$idOcupacion')";
        $resultadoSQL =$this->execSql($sql);
        if($resultadoSQL){
            return "se guardo con exito";
        }else{
            return "no se guardo";
        }
 
    }
    function updateItem($idOcupacion)
    {
        $cod = $idOcupacion ->get('cod');
        $nombre = $idOcupacion ->get('nombre');
        $idOcupacion = $idOcupacion ->get('idOcupacion');
        $registro = $this->getItem($idOcupacion);
        if(!isset($registro)){
            return "El registro ya existe";
        }
        $sql = 'update asignatura2_db set';
        //.= concatenar algo que ya existe
        $sql .= "cod= '$cod',";
        $sql .= "nombre= '$nombre',";
        $sql .= "where idOcupacion = $idOcupacion";
                
        $resultSQL =$this->execSql($sql);
        if($resultSQL){
            return "se guardo con exito";
        }else{
            return "no se guardo";
        }
    }
    function deleteItem($codigo)
    {
        
    }
    function getitemocupacion(){
        
    }
}
?>