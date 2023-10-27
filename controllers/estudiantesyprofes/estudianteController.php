<?php

namespace App\controllers\estudiantesYprofes;
use App\controllers\EntityController;
use App\models\Estudiante;

class EstudianteController extends EntityController{
    //getdata
    function allData()
    {
        $sql = "select * from cursos";
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante -> set('codigo', $item['codigo']);
                $estudiante -> set('nombre', $item['nombre']);
                $estudiante -> set('email', $item['email']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                array_push($lista, $estudiante);
            }
        }
        return $lista;
    }
    function getItem($codigo){
        $sql = "select * from estudiante where codigo=".$codigo;
        $resultSQL = $this->execSql($sql);
        $estudiante = null;
        if($resultSQL->num_rows>0){
            //el fetch_assoc lo que hace es un ciclo de interacion 
            //para poder recorrer cada una de las posiciones
            while($item = $resultSQL->fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante -> get('codigo', $item['codigo']);
                $estudiante -> get('nombre', $item['nombre']);
                $estudiante -> get('email', $item['email']);
                //meto de php con array_push para agregar un objeto ya establecido anteriorimente
                break;
            }
        }
        return $estudiante;
    }

    function addItem($estudiante)
    {
        $codigo = $estudiante ->get('codigo');
        $nombre = $estudiante ->get('nombre');
        $email = $estudiante ->get('email');
        $registro = $this->getItem($codigo);
        if(isset($registro)){
            return "El codigo ya existe";
        }
        $sql = "Insert into estudiante(codigo,nombre,email)value ('$codigo','$nombre','$email')";
        $resultadoSQL =$this->execSql($sql);
        if($resultadoSQL){
            return "se guardo con exito";
        }else{
            return "no se guardo";
        }
 
    }
    function updateItem($estudiante)
    {
        $codigo = $estudiante ->get('codigo');
        $nombre = $estudiante ->get('nombre');
        $email = $estudiante ->get('email');
        $registro = $this->getItem($codigo);
        if(!isset($registro)){
            return "El registro ya existe";
        }
        $sql = 'update estudiante set ';
        //.= concatenar algo que ya existe
        $sql .= "nombre= '$nombre',";
        $sql .= "email= '$email', ";
        $sql .= "where codigo = $codigo";
                
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