<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd=new bd();

$cadena="";
$fecha="";
$result="";
$result2="";

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
$resultados=$bd->consultar("SELECT * FROM vw_rejilla_medicos");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/


if(isset ($_GET["todos"]))
    {
        $result=$bd->consultarArray("select * from vw_rejilla_medicos");
    }

    
if(isset ($_GET["buscar"]) && $_GET["cadena"]<>"")
    {
        $cadena=$_GET["cadena"];
        $result=$bd->consultarArray("SELECT * from vw_rejilla_medicos where Medico like '%".$cadena."%'");
        $result2=$bd->consultar("SELECT * from vw_rejilla_medicos where Medico like '%".$cadena."%'");
        
    }
    elseif (!isset ($_GET['buscar']))
{
       
       $result=$bd->consultarArray("SELECT * FROM vw_rejilla_medicos ORDER BY Medico asc LIMIT $inicio, $registros");
}
    
  
if($result)
    {
        echo '<h3>REJILLA MEDICO</h3><br/>';
        $rejilla=new rejilla($result,"index.php?cuerpo=form_medicos.php&","id","Medico");
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
else
{
     if (isset($_GET["buscar"]) && $cadena=="")
        {
            echo '<p class="error">Introduzca el dato que desea buscar.</p>';
        }
        else
        {
            echo '<p class="error">No se ha encontrado ningún registro.</p>';
        }
}
/*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_medicos.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_medicos.php&pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_medicos.php&pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 /*********** Fin Paginacion ***************/




    
    if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
    {                                            //Incluir en Generador   
        echo '<p>'.$_GET['msj2'].'</p>';            //Incluir en Generador
     }                                           //Incluir en Generador                                                                                         

    
?>

<form action="index.php" method="get">        
    <input type="text" name="cadena"/>
    <input type="hidden" name="cuerpo" value="rejilla_medicos.php" />
    <input class="boton" type="submit" name="buscar" value="Buscar"/>
</form>


<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="form_medicos.php" />
    <input class="boton" type="submit" name="nuevo" value="Nuevo"/>
</form>
  