<?php
class visita_enfermedad
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $id_visita=null;
    public $id_enfermedad=null;
    public function cargar($arrayValores)
        {
        if(! is_array($arrayValores))
            {
            throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
            }
        isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
        isset($arrayValores['id_visita'])?$this->id_visita=$arrayValores['id_visita']:$this->id_visita=null;
        isset($arrayValores['id_enfermedad'])?$this->id_enfermedad=$arrayValores['id_enfermedad']:$this->id_enfermedad=null;
        }
    }
?>