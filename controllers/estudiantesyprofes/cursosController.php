<?php

namespace App\controllers\cursos;
use App\controllers\EntityController;
use App\models\Cursos;

class cursosController extends EntityController{
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
                $cursos = new Cursos();
                $cursos -> set('cod', $item['cod']);
                $cursos -> set('nombre', $item['nombre']);
                $cursos -> set('cod_docente', $item['cod_docente']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                array_push($lista, $cursos);
            }
        }
        return $lista;
    }
    function getItem($cursos){
        $sql = "select * from asignaturas2_db where cursos=".$cursos;
        $resultSQL = $this->execSql($sql);
        $cursos = null;
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $cursos = new Cursos();
                $cursos -> get('cod', $item['cod']);
                $cursos -> get('nombre', $item['nombre']);
                $cursos-> get('cod_docente', $item['cod_docente']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                break;
            }
        }
        return $cursos;
    }

    function addItem($cursos)
    {
        $cod = $cursos ->get('cod');
        $nombre = $cursos ->get('nombre');
        $cod_docente = $cursos ->get('cod_docente');
        $registro = $this->getItem($cod_docente);
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "Insert into cursos(cod,nombre,cod_docente)value ('$cod','$nombre','$cod_docente')";
        $resultadoSQL =$this->execSql($sql);
        if($resultadoSQL){
            return "se guardo con exito";
        }else{
            return "no se guardo";
        }
 
    }
    function updateItem($cursos)
    {
        $cod = $cursos ->get('cod');
        $nombre = $cursos ->get('nombre');
        $cod_docente = $cursos ->get('cod_docente');
        $registro = $this->getItem($cursos);
        if(!isset($registro)){
            return "El registro ya existe";
        }
        $sql = 'update asignatura2_db set';
        //.= concatenar algo que ya existe
        $sql .= "cod= '$cod',";
        $sql .= "nombre= '$nombre',";
        $sql .= "where cod_docente = $cod_docente";
                
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
    
}
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
                $cursos = new Cursos();
                $cursos -> set('cod', $item['cod']);
                $cursos -> set('nombre', $item['nombre']);
                $cursos -> set('idOcupacion', $item['idOcupacion']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                array_push($lista, $cursos);
            }
        }
        return $lista;
    }
    function getItem($cursos){
        $sql = "select * from asignaturas2_db where cursos=".$cursos;
        $resultSQL = $this->execSql($sql);
        $cursos = null;
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $cursos = new Cursos();
                $cursos -> get('cod', $item['cod']);
                $cursos -> get('nombre', $item['nombre']);
                $cursos-> get('cod_docente', $item['cod_docente']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                break;
            }
        }
        return $cursos;
    }

    function addItem($cursos)
    {
        $cod = $cursos ->get('cod');
        $nombre = $cursos ->get('nombre');
        $cod_docente = $cursos ->get('cod_docente');
        $registro = $this->getItem($cod_docente);
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "Insert into cursos(cod,nombre,cod_docente)value ('$cod','$nombre','$cod_docente')";
        $resultadoSQL =$this->execSql($sql);
        if($resultadoSQL){
            return "se guardo con exito";
        }else{
            return "no se guardo";
        }
 
    }
    function updateItem($cursos)
    {
        $cod = $cursos ->get('cod');
        $nombre = $cursos ->get('nombre');
        $cod_docente = $cursos ->get('cod_docente');
        $registro = $this->getItem($cursos);
        if(!isset($registro)){
            return "El registro ya existe";
        }
        $sql = 'update asignatura2_db set';
        //.= concatenar algo que ya existe
        $sql .= "cod= '$cod',";
        $sql .= "nombre= '$nombre',";
        $sql .= "where cod_docente = $cod_docente";
                
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
    
}
?>