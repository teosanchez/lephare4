<?php
include ("clase_rejilla_historial.php");
include_once ("clase_bd.php");

$bd=new bd();

/*********** Paginacion ***************/
$registros=2;
$inicio=0;
if(isset($_GET['pagina']))
    {
    $pagina=$_GET['pagina'];
    $inicio=($pagina-1)*$registros;        
    }
else 
    {
    $pagina=1;
    }
$resultados=$bd->consultar("SELECT * FROM vw_rejilla_historial");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/

if(isset ($_GET["id_paciente"]))
    {
        $id_paciente=$_GET["id_paciente"];
        $result=$bd->consultarArray("select * from vw_rejilla_historial where id_paciente='".$id_paciente."'");
        $result2=$bd->consultar("select * from vw_rejilla_historial where id_paciente='".$id_paciente."'");
    }    
//-----------------Comienzo Rejilla--------------------------
    echo '<h3>REJILLA HISTORIAL</h3><br/>';
    echo "<h3>Historial de ".$_GET['nombre_paciente']."</h3><br/>";

if($result)
{    
    $rejilla=new rejilla($result,"index.php?cuerpo=form_visitas.php&","id","Fecha");
    echo $rejilla->pintar();      
        if ($result2<>"")       /* Incluir  en generador este if */
    {
        $num_registros= mysql_num_rows($result2);
        if ($num_registros == 1)
        {
            echo '<p>Se ha encontrado '.$num_registros.' registro.</p>';
        }
        else
        {
            echo '<p>Se han encontrado '.$num_registros.' registros.</p>';
        }
    }
}
?>
