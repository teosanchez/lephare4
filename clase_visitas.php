<?php
class visitas
    {
    //Atributos de la tabla de la bd
    public $id=null;
    public $id_paciente=null;
    public $id_medico=null;
    public $fecha=null;
    public $tarifa_consulta=null;
    public $tarifa_diabetes=null;
    public $tarifa_medicamentos=null;
    public $diagnostico=null;
    public $medicamentos=null;
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
        isset($arrayValores['fecha'])?$this->fecha=date("d-m-Y H:i:s",strtotime($arrayValores['fecha'])):$this->fecha=null;
        /*
         * 
         * 
         * 
        */
        isset($arrayValores['tarifa_consulta'])?$this->tarifa_consulta=$arrayValores['tarifa_consulta']:$this->tarifa_consulta=null;
        isset($arrayValores['tarifa_diabetes'])?$this->tarifa_diabetes=$arrayValores['tarifa_diabetes']:$this->tarifa_diabetes=null;
        isset($arrayValores['tarifa_medicamentos'])?$this->tarifa_medicamentos=$arrayValores['tarifa_medicamentos']:$this->tarifa_medicamentos=null;
        isset($arrayValores['diagnostico'])?$this->diagnostico=$arrayValores['diagnostico']:$this->diagnostico=null;
        isset($arrayValores['medicamentos'])?$this->medicamentos=$arrayValores['medicamentos']:$this->medicamentos=null;
        }
    }
?>