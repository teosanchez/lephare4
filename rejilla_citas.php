<?php
include ("clase_rejilla_citas.php");
include_once ("clase_bd.php");
$bd=new bd();

/*********** Establecer consulta ***************/
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
$resultados=$bd->consultar("SELECT * FROM vw_rejilla_citas");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/
if(isset ($_GET["fecha"]) && $_GET["fecha"]<>"")
{	
$fecha=$_GET["fecha"];
$result=$bd->consultarArray("select * from vw_rejilla_citas where Fecha='".$fecha."'");
$result2=$bd->consultar("select * from vw_rejilla_citas where Fecha='".$fecha."'");
}
else
{
        if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"")
        {	
                $cadena=$_GET["cadena"];
                $result=$bd->consultarArray("SELECT * from vw_rejilla_citas
                                             where Paciente like '%".$cadena."%' 
                                             or Medico like '%".$cadena."%'");
                $result2=$bd->consultar("SELECT * from vw_rejilla_citas
                                                                            where Paciente like '%".$cadena."%' 
                                                                            or Medico like '%".$cadena."%'");
        }    
        else
        {
                if (!isset($_GET["buscar_fecha"]) and !isset($_GET["buscar_cadena"]))
                {	
                        /*paginacion (ordenado por fecha)*/
                    $result=$bd->consultarArray("SELECT * FROM vw_rejilla_citas ORDER BY Fecha asc LIMIT $inicio, $registros");
                }
        }   
	
}
/******************** Fin establecer consulta *****************/

echo '<h3>REJILLA CITAS</h3><br/>';

if($result)
    {
    $rejilla=new rejilla_citas($result,"index.php?cuerpo=form_citas.php&","id","Paciente");
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
else	/* Incluir en generador este else */
{
    if (isset($_GET["buscar_fecha"]) && $fecha=="")
    {
        echo '<p class="error">Introduzca una fecha.</p>';
    }
    else
    {
        if (isset($_GET["buscar_cadena"]) && $cadena=="")
        {
            echo '<p class="error">Introduzca el dato que desea buscar.</p>';
        }
        else
        {
            echo '<p class="error">No se ha encontrado ningún registro.</p>';
        }
    }
}
    
if(isset ($_GET['msj'])&& $_GET['msj']!="")
{
    echo '<p>Error: '.$_GET['msj'].'</p>';
}
if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
{                                           //Incluir en Generador
    echo '<p>'.$_GET['msj2'].'</p>';            //Incluir en Generador
}                                           //Incluir en Generador

/*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_citas.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_citas.php&pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_citas.php&pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 /*********** Fin Paginacion ***************/      
?>
<form action="index.php" method="get">
	<input type="hidden" name="cuerpo" value="form_citas.php" />
	<br/><input class="boton" type="submit" name="nuevo" value="Nueva Cita"/>
</form>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_citas.php" />
	<input type="text" name="fecha"/>
	<input class="boton" type="submit" name="buscar_fecha" value="Buscar Fecha"/>
</form>

<form action="index.php" method="get">
	<input type="hidden" name="cuerpo" value="rejilla_citas.php" />
	<input type="text" name="cadena"/>
	<input class="boton" type="submit" name="buscar_cadena" value="Buscar Dato"/>
</form>