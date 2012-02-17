<?php
include ("clase_citas.php");
include_once ("clase_bd.php");
include_once ('clase_validador.php');

$citas=new citas();
$bd=new bd();
$msj="";
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $citas->id=$_GET["id"];
        $citas->id_paciente=$_GET["id_paciente"];
        $citas->id_medico=$_GET["id_medico"];
        /* MODIFICADO -->         MODIFICAR FECHA:  CAMBIAR EN CHORIZEITOR*/
        /*
         * 
         * 
         */
        $citas->fecha=date("Y-m-d",strtotime($_GET["fecha"]));
        /*
         * 
         * 
         */
        $citas->hora=$_GET["hora"];
        $citas->comentarios=$_GET["comentarios"];
        $condicion=new validar_citas_completo();
        if($condicion->validar($citas))
            {
            if($_GET["id"]=="")
                {                   
                $bd->insertar($citas);
                $msj2="Registro Insertado Correctamete.";//Incluir en Generador
                }
            else
                {
                $bd->actualizar($citas);
                $msj2="Registro Actualizado Correctamente.";//Incluir en Generador
                }
            }
        else 
            {
            $msj="Demasiadas citas para este médico.";
            //throw  new Exception("Demasiadas citas para este Médico.");
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $citas->id=$_GET["id"];
    $bd->borrar($citas);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
 header('Location: index.php?cuerpo=rejilla_citas.php&msj='.$msj.'&msj2='.$msj2);//Incluir en Generador
?>