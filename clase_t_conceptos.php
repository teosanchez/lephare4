<?php
 
        class t_conceptos

        {

            //Atributos de la tabla de la bd
	 public $id=null;
	 public $nombre=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
		 isset($arrayValores['nombre'])?$this->nombre=$arrayValores['nombre']:$this->nombre=null;
	}
}
?>