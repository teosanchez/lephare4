<?php
 class citas
{

//Atributos de la tabla de la bd
 public $id=null;
 public $id_paciente=null;
 public $id_medico=null;
 public $fecha=null;
 public $hora=null;
 public $comentarios=null;
 public $visitado=null;

 public function cargar($arrayValores)

    {

     if(! is_array($arrayValores))

        {
        throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");
        }
     isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
     isset($arrayValores['id_paciente'])?$this->id_paciente=$arrayValores['id_paciente']:$this->id_paciente=null;
     isset($arrayValores['id_medico'])?$this->id_medico=$arrayValores['id_medico']:$this->id_medico=null;
     /* MODIFICADO -->         MODIFICAR FECHA:  CAMBIAR EN CHORIZEITOR*/
     /*
      * 
      * 
      */
     isset($arrayValores['fecha'])?$this->fecha=date("d-m-Y",strtotime($arrayValores['fecha'])):$this->fecha=null;
     /*
      * 
      * 
      * 
      */
     isset($arrayValores['hora'])?$this->hora=$arrayValores['hora']:$this->hora=null;
     isset($arrayValores['comentarios'])?$this->comentarios=$arrayValores['comentarios']:$this->comentarios=null;
     isset($arrayValores['visitado'])?$this->visitado=$arrayValores['visitado']:$this->visitado=null;
    }
}
?>