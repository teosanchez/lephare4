<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

$bd=new bd();
/*********** Establecer consulta ***************/
$cadena="";
$result="";
$result2="";    /* Incluir en generador el cálculo de $result2 */
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
$resultados=$bd->consultar("SELECT * FROM vw_rejilla_enfermedades");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/


if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"") //Evalua si existe esta variable y si viene con algun contenido, la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT * from vw_rejilla_enfermedades where Enfermedad like '%".$cadena."%'");
    $result2=$bd->consultar("SELECT * from vw_rejilla_enfermedades where Enfermedad like '%".$cadena."%'");
    //echo "ENTRA IF 2";
}

if (isset($_GET["cadena"]) && $_GET["cadena"]=="") //Evalua si existe esta variable y si viene sin contenido (vacia), la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    echo '<p class="error">Introduzca una enfermedad.</p>';
    //echo "ENTRA IF 3";
}
else 
{
    if(!isset ($_GET["cadena"]))
    {
        //$result=$bd->consultarArray("select * from vw_rejilla_enfermedades order by Enfermedad limit 10");
        $result=$bd->consultarArray("SELECT * FROM vw_rejilla_enfermedades ORDER BY Enfermedad asc LIMIT $inicio, $registros");
    }
}


if($result)
    {
    echo '<h3>REJILLA ENFERMEDAD</h3><br/>';
    $rejilla=new rejilla($result,"index.php?cuerpo=form_t_enfermedades.php&","id","Enfermedad");
    echo $rejilla->pintar();
    }
    
     if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
    {                                            //Incluir en Generador   
    echo '<p>'.$_GET['msj2'].'</p>';             //Incluir en Generador   
    }                                             //Incluir en Generador 
if(isset ($_GET["buscar"]) or isset ($_GET["todos"])  )
    {
    echo '<form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="rejilla_t_enfermedades.php" />
        <br/><input class="boton" type="submit" name="Cancelar" value="Cancelar"/>
        </form><br/>';
    }
else 
    {
     /*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_t_enfermedades.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_t_enfermedades.php&pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_t_enfermedades.php&pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 /*********** Fin Paginacion ***************/   
    
    echo '
        <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_t_enfermedades.php" />
        <br/><input class="boton" type="submit" name="nuevo" value="Nuevo"/>
        </form><br/><br/>        

        <form action="index.php" method="get">
        <br/>Buscar
        <input type="text" name="cadena"/>
        <input type="hidden" name="cuerpo" value="rejilla_t_enfermedades.php" />
        <input class="boton" type="submit" name="buscar" value="Buscar"/>
        </form>
       
        ';
    }
    
   
?>  