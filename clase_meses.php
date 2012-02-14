<?php
class meses
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $mes=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
        {
        throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
        }
        isset($arrayValores[`id`])?$this->id=$arrayValores[`id`]:$this->id=null;
        isset($arrayValores[`nom_mes`])?$this->mes=$arrayValores[`nom_mes`]:$this->mes=null;
        }
    }
?>