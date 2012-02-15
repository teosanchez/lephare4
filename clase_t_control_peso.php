<?php
 
        class t_control_peso

        {

            //Atributos de la tabla de la bd
	 public $id=null;
	 public $id_nutricion=null;
	 public $fecha=null;
	 public $peso=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
		 isset($arrayValores['id_nutricion'])?$this->id_nutricion=$arrayValores['id_nutricion']:$this->id_nutricion=null;
		 isset($arrayValores['fecha'])?$this->fecha=$arrayValores['fecha']:$this->fecha=null;
		 isset($arrayValores['peso'])?$this->peso=$arrayValores['peso']:$this->peso=null;
	}
}
?>