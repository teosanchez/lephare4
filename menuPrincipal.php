<?php
include("clase_bd.php");
$bd=new bd();
$datos=$bd->consultar("select * from menu");
$salida="";
if ($datos)
    {
     $salida="<ul>";
     while($row = mysql_fetch_array($datos))
         {
         $salida.="<li><a href=\"".$row["enlace"]."\">".$row['texto']."</a></li><br/>";
         }
     $salida.="</ul>";
    }
echo $salida;
?>