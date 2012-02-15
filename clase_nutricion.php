<?php
 
        class nutricion

        {

            //Atributos de la tabla de la bd
	 public $id=null;
	 public $id_paciente=null;
	 public $fecha_ingreso=null;
	 public $peso_ingreso=null;
	 public $peso_nacimiento=null;
	 public $peso_alta=null;
	 public $enfermedad=null;
	 public $fecha_muerte=null;
	 public $fecha_alta=null;
	 public $reenvio_hospital=null;

	 public function cargar($arrayValores)

        {

      	 if(! is_array($arrayValores))

            {
                throw new Exception("Es necesario un array con los mismos campos que propiedades tiene el objeto");

            }
		 isset($arrayValores['id'])?$this->id=$arrayValores['id']:$this->id=null;
		 isset($arrayValores['id_paciente'])?$this->id_paciente=$arrayValores['id_paciente']:$this->id_paciente=null;
		 isset($arrayValores['fecha_ingreso'])?$this->fecha_ingreso=$arrayValores['fecha_ingreso']:$this->fecha_ingreso=null;
		 isset($arrayValores['peso_ingreso'])?$this->peso_ingreso=$arrayValores['peso_ingreso']:$this->peso_ingreso=null;
		 isset($arrayValores['peso_nacimiento'])?$this->peso_nacimiento=$arrayValores['peso_nacimiento']:$this->peso_nacimiento=null;
		 isset($arrayValores['peso_alta'])?$this->peso_alta=$arrayValores['peso_alta']:$this->peso_alta=null;
		 isset($arrayValores['enfermedad'])?$this->enfermedad=$arrayValores['enfermedad']:$this->enfermedad=null;
		 isset($arrayValores['fecha_muerte'])?$this->fecha_muerte=$arrayValores['fecha_muerte']:$this->fecha_muerte=null;
		 isset($arrayValores['fecha_alta'])?$this->fecha_alta=$arrayValores['fecha_alta']:$this->fecha_alta=null;
		 isset($arrayValores['reenvio_hospital'])?$this->reenvio_hospital=$arrayValores['reenvio_hospital']:$this->reenvio_hospital=null;
	}
}
?>