<?php
class t_enfermedades
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $enfermedad=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
            {
            throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
            }
        isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
        isset($arrayValores['enfermedad'])?$this->enfermedad=$arrayValores['enfermedad']:$this->enfermedad=null;
        }
    }
?>