<?php
include_once ('clase_bd.php');
include ('interfaces.php');
class citas_por_medico implements Ivalidador 
    //Un médico no puede tener más de 5 citas al día
    //Reglas de negocio
    /*$cadena="select visitas from vw_citas_medico
    where id_medico=3 and fecha='2011-11-10'";*/
    {
     public function validar($citas)
        {
        $cadena="select visitas from vw_citas_medico
        where id_medico=$citas->id_medico
        and fecha='$citas->fecha'";
        $bd=new bd();
        $resp=$bd->consultarArray($cadena);
        if($resp[0]['visitas']<5)
            {
            return true;
            }
        else
            {
            return false;
            }
        }
    }
class di_que_si implements Ivalidador
    {
    public function validar($cita)
        {
        return TRUE;
        }
    }
class validar_citas_completo implements Ivalidador
    {
    public function validar($cita)
        {
        $val_1=new citas_por_medico();
        $val_2=new di_que_si();
        if($val_1->validar($cita) && $val_2->validar($cita))
            {
            return TRUE;
            }
        else 
            {
            return FALSE;    
            }
        }
    }
?>