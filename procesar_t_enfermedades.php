<?php
include ("clase_t_enfermedades.php");
include_once ("clase_bd.php");
$t_enfermedades=new t_enfermedades();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $t_enfermedades->id=$_GET["id"];
        $t_enfermedades->enfermedad=$_GET["enfermedad"];
        if($_GET["id"]=="")
            {
            $bd->insertar($t_enfermedades);
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            }
        else
            {
            $bd->actualizar($t_enfermedades);
            $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $t_enfermedades->id=$_GET["id"];
    $bd->borrar($t_enfermedades);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
header('Location: index.php?cuerpo=rejilla_t_enfermedades.php&msj2='.$msj2);//Incluir en Generador
?>