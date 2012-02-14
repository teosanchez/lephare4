<?php
class annos
    {
    //Atributos de la tabla de la bd
    public $anno=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
        {
        throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
        }
        isset($arrayValores[`Año`])?$this->anno=$arrayValores[`Año`]:$this->anno=null;
        }
    }
?>