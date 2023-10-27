<?php

namespace App\models;
class Docente{
    private $cod;
    private $nombre;
    private $idOcupacion;

    function get($prop){
        return $this->$prop;
    }
    function set($prop, $value){
        $this->$prop = $value;
    } 
    // una de las formas de como se puede hacer un constructor de get y set private $codigo;
    }

class Cursos{
        private $cod;
        private $nombre;
        private $cod_docente;
    
        function get($prop){
            return $this->$prop;
        }
        function set($prop, $value){
            $this->$prop = $value;
        } 
        // una de las formas de como se puede hacer un constructor de get y set private $codigo;
        }