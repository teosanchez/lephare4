<?php
class pacientes
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $nombre=null;
    public $apellidos=null;
    public $numero_carnet=null;
    public $fecha_nacimiento=null;
    public $sexo=null;
    public $nombre_madre=null;
    public $telefono=null;
    public $barrio=null;
    public $distancia=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
        {
        throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
        }
        isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
        isset($arrayValores['nombre'])?$this->nombre=$arrayValores['nombre']:$this->nombre=null;
        isset($arrayValores['apellidos'])?$this->apellidos=$arrayValores['apellidos']:$this->apellidos=null;
        isset($arrayValores['numero_carnet'])?$this->numero_carnet=$arrayValores['numero_carnet']:$this->numero_carnet=null;
        isset($arrayValores['fecha_nacimiento'])?$this->fecha_nacimiento=$arrayValores['fecha_nacimiento']:$this->fecha_nacimiento=null;
        isset($arrayValores['sexo'])?$this->sexo=$arrayValores['sexo']:$this->sexo=null;
        isset($arrayValores['nombre_madre'])?$this->nombre_madre=$arrayValores['nombre_madre']:$this->nombre_madre=null;
        isset($arrayValores['telefono'])?$this->telefono=$arrayValores['telefono']:$this->telefono=null;
        isset($arrayValores['barrio'])?$this->barrio=$arrayValores['barrio']:$this->barrio=null;
        isset($arrayValores['distancia'])?$this->distancia=$arrayValores['distancia']:$this->distancia=null;
        }
    }
?>