<?php
include ("clase_medicos.php");
include_once ("clase_bd.php");

$medicos=new medicos();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $medicos->id=$_GET["id"];
        $medicos->nombre=$_GET["nombre"];
        $medicos->apellidos=$_GET["apellidos"];
        $medicos->telefono=$_GET["telefono"];
        if($_GET["id"]=="")
            {
            $bd->insertar($medicos);
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            }
        else
            {
            $bd->actualizar($medicos);
            $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $medicos->id=$_GET["id"];
    $bd->borrar($medicos);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
header('Location: index.php?cuerpo=rejilla_medicos.php&msj2='.$msj2);//Incluir en Generador
?>