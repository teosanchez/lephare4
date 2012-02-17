<?php
include ("clase_visita_enfermedad.php");
include_once ("clase_bd.php");

$visita_enfermedad=new visita_enfermedad();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $visita_enfermedad->id=$_GET["id"];
        $visita_enfermedad->id_visita=$_GET["id_visita"];
        $visita_enfermedad->id_enfermedad=$_GET["id_enfermedad"];
        if($_GET["id"]=="")
            {
            $bd->insertar($visita_enfermedad);
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            }
        else
            {
            $bd->actualizar($visita_enfermedad);
            $msj2="Registro Actulizado Correctamete.";//Incluir en Generador
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $visita_enfermedad->id=$_GET["id"];
    $bd->borrar($visita_enfermedad);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
header('Location: index.php?cuerpo=rejilla_visita_enfermedad.php&msj2='.$msj2);//Incluir en Generador
?>