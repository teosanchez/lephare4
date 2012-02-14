<?php
include ("clase_pacientes.php");
include_once ("clase_bd.php");
$pacientes=new pacientes();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $pacientes->id=$_GET["id"];
        $pacientes->nombre=$_GET["nombre"];
        $pacientes->apellidos=$_GET["apellidos"];
        $pacientes->numero_carnet=$_GET["numero_carnet"];
        /* MODIFICADO -->         MODIFICAR FECHA:  CAMBIAR EN CHORIZEITOR*/
        /*
         * 
         * 
         */
        $pacientes->fecha_nacimiento=date("Y-m-d",strtotime($_GET["fecha_nacimiento"]));
        /*
         * 
         * 
         */        
        $pacientes->sexo=$_GET["sexo"];
        $pacientes->nombre_madre=$_GET["nombre_madre"];
        $pacientes->telefono=$_GET["telefono"];
        $pacientes->barrio=$_GET["barrio"];
        $pacientes->distancia=$_GET["distancia"];
        if($_GET["id"]=="")
            {
            $bd->insertar($pacientes);            
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            }
        else
            {
            $bd->actualizar($pacientes);
            $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
            }
        }
    }  
if(isset($_GET["Borrar"])) 
    {
    $pacientes->id=$_GET["id"];
    $bd->borrar($pacientes);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
header('Location: index.php?cuerpo=rejilla_pacientes.php&msj2='.$msj2 );//Incluir en Generador
?>