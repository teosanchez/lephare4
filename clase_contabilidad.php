<?php
 
        class contabilidad

        {

            //Atributos de la tabla de la bd
	 public $id=null;
	 public $id_visita=null;
	 public $id_concepto=null;
	 public $fecha=null;
	 public $cantidad=null;
	 public $tipo=null;
	 public $descripcion=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
		 isset($arrayValores['id_visita'])?$this->id_visita=$arrayValores['id_visita']:$this->id_visita=null;
		 isset($arrayValores['id_concepto'])?$this->id_concepto=$arrayValores['id_concepto']:$this->id_concepto=null;
		 isset($arrayValores['fecha'])?$this->fecha=$arrayValores['fecha']:$this->fecha=null;
		 isset($arrayValores['cantidad'])?$this->cantidad=$arrayValores['cantidad']:$this->cantidad=null;
		 isset($arrayValores['tipo'])?$this->tipo=$arrayValores['tipo']:$this->tipo=null;
		 isset($arrayValores['descripcion'])?$this->descripcion=$arrayValores['descripcion']:$this->descripcion=null;
	}
}
?>