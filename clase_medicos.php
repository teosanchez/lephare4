<?php
class medicos
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $nombre=null;
    public $apellidos=null;
    public $telefono=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
            {
            throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
            }
        isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
        isset($arrayValores['nombre'])?$this->nombre=$arrayValores['nombre']:$this->nombre=null;
        isset($arrayValores['apellidos'])?$this->apellidos=$arrayValores['apellidos']:$this->apellidos=null;
        isset($arrayValores['telefono'])?$this->telefono=$arrayValores['telefono']:$this->telefono=null;
        }
    }
?>