<?php
include ("clase_menu.php");
include_once ("clase_bd.php");
$menu=new menu();
$bd=new bd();
if(isset($_GET["Enviar"])) 
    {
    if(isset($_GET["id"]))
        {
        $menu->id=$_GET["id"];
        $menu->id_padre=$_GET["id_padre"];
        $menu->enlace=$_GET["enlace"];
        $menu->texto=$_GET["texto"];
        if($_GET["id"]=="")
            {
            $bd->insertar($menu);
            $msj2="Registro Insertado Correctamete.";//Incluir en Generador
            }
        else
            {
            $bd->actualizar($menu);
            $msj2="Registro Actualizado Correctamete.";//Incluir en Generador
            }
        }
    }
if(isset($_GET["Borrar"])) 
    {
    $menu->id=$_GET["id"];
    $bd->borrar($menu);
    $msj2="Registro Eliminado Correctamente.";//Incluir en Generador
    }
header('Location: index.php?cuerpo=rejilla_menu.php&msj2='.$msj2);//Incluir en Generador
?>