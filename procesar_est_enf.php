<?php
include_once ("clase_bd.php");
$bd=new bd();

if (isset ($_GET["A�os"]))
    {
        $anno = $_GET["A�os"];
    }
else
    {
        $anno=date("Y");
    }
if (isset ($_GET["Meses"]))
    {
        $indice_mes = $_GET["Meses"];
    }
else
    {
        $indice_mes=date("n");
   }
if(isset($_GET["est_mensuales"])) 
{
    header('Location: index.php?cuerpo=rejilla_est_enf_mensuales.php&A�os='.$anno.
            "&Meses=".$indice_mes);//Incluir en Generador
}
if(isset($_GET["porc_mensuales"])) 
{
    header('Location: index.php?cuerpo=rejilla_porc_enf_mensuales.php&A�os='.$anno.
            "&Meses=".$indice_mes);//Incluir en Generador
}
if(isset($_GET["est_anuales"])) 
{
    header('Location: index.php?cuerpo=rejilla_est_enf_anuales.php&A�os='.$anno.
            "&Meses=".$indice_mes);//Incluir en Generador
}
if(isset($_GET["porc_anuales"])) 
{
    header('Location: index.php?cuerpo=rejilla_porc_enf_anuales.php&A�os='.$anno.
            "&Meses=".$indice_mes);//Incluir en Generador
}

?>