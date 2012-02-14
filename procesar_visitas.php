<?php
include ("clase_visitas.php");
include_once ("clase_bd.php");
include("clase_citas.php");
$visitas=new visitas();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $visitas->id=$_GET["id"];
        $visitas->id_paciente=$_GET["id_paciente"];
        $visitas->id_medico=$_GET["id_medico"];
        /* MODIFICADO -->         MODIFICAR FECHA:  CAMBIAR EN CHORIZEITOR*/
        /*
         * 
         * 
         */
        $visitas->fecha=date("Y-m-d H:i:s",strtotime($_GET["fecha"]));
        /*
         * 
         * 
         */
        $visitas->tarifa_consulta=$_GET["tarifa_consulta"];
        $visitas->tarifa_diabetes=$_GET["tarifa_diabetes"];
        $visitas->tarifa_medicamentos=$_GET["tarifa_medicamentos"];
        $visitas->diagnostico=$_GET["diagnostico"];
        $visitas->medicamentos=$_GET["medicamentos"];
        if($_GET["id"]=="")
            {
            $bd->insertar($visitas);
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            if(isset ($_GET["id_cita"]))
                {
                $cita=new citas();
                $cita->id=$_GET["id_cita"];
                $cita->visitado=true;
                $bd->actualizar($cita);
                $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
                //$bd->consultar ("update vw_rejilla_citas set Visitado=true where id=".$_GET["id_cita"]);
                }
            }   
        else
            {
            $bd->actualizar($visitas);
            $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $visitas->id=$_GET["id"];
    $bd->borrar($visitas);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
if(isset($_GET["id_cita"]))
    {
    header('Location: index.php?cuerpo=rejilla_citas.php');
    }
 else 
    {
    header('Location: index.php?cuerpo=rejilla_visitas.php&msj2='.$msj2);//Incluir en Generador
    }
?>