<?php
include ("clase_rejilla_est_enfermedades.php");
include_once ("clase_bd.php");

$bd=new bd();
/*********** Paginacion ***************/
$registros=15;
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
$resultados=$bd->consultar("SELECT * FROM vw_edad_paciente_nom_mes_visita_enfermedad");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/

/*********** Establecer consulta ***************/
$cadena="";
$result="";
$result2="";    /* Incluir en generador el cálculo de $result2 */

if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"") //Evalua si existe esta variable y si viene con algun contenido, la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT * from vw_edad_paciente_nom_mes_visita_enfermedad where
        Enfermedad like '%".$cadena."%'or Mes like '%".$cadena."%'");
    $result2=$bd->consultar("SELECT * from vw_edad_paciente_nom_mes_visita_enfermedad where
        Enfermedad like '%".$cadena."%'or Mes like '%".$cadena."%'");
}
else    
{
    if(!isset ($_GET["cadena"]))
    {       /*paginacion */
        $result=$bd->consultarArray("SELECT * FROM vw_edad_paciente_nom_mes_visita_enfermedad
            LIMIT $inicio, $registros");
    }
}

/******************** Fin establecer consulta *****************/

echo '<h3>ESTADÍSTICAS ENFERMEDADES</h3><br/>';

if($result)
{
    $rejilla=new rejilla_est_enfermedades($result);
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
    if (isset($_GET["buscar_cadena"]) && $cadena=="")
    {
        echo '<p class="error">Introduzca el dato que desea buscar.</p>';
    }
    else
    {
        echo '<p class="error">No se ha encontrado ningún registro.</p>';
    }
}

if(isset ($_GET['msj'])&& $_GET['msj']!="")
{
    echo '<p>Error: '.$_GET['msj'].'</p>';
}
    
if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
{                                            //Incluir en Generador   
    echo '<p>'.$_GET['msj2'].'</p>';             //Incluir en Generador   
} //Incluir en Generador 

     /*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_est_enfermedades.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_est_enfermedades.php&pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_est_enfermedades.php&pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 
 /*********** Fin Paginacion ***************/
?>

<form action="index.php" method="get">
    <input type="text" name="cadena"/>
    <input type="hidden" name="cuerpo" value="rejilla_est_enfermedades.php"/>
    <input class="boton" type="submit" name="buscar" value="Buscar"/>
</form>