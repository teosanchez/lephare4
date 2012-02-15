<?php
include ("clase_rejilla_est_enfermedades.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
include ("clase_annos.php");
include ("clase_meses.php");

$bd=new bd();
$util=new utilidadesIU();
$annos=new annos();
$meses=new meses();

/*********** Cálculo de $anno  ***************/

if (isset ($_GET["Años"]))
    {
        $anno = $_GET["Años"];
    }
else
    {
        $anno=date("Y");
    }
    
/***********  Fin Cálculo de $anno ***************/

/*********** Establecer consulta ***************/
$cadena="";
$result="";
$result2="";    /* Incluir en generador el cñlculo de $result2 */
if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"") //Evalua si existe esta variable y si viene con algun contenido, la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
                from vw_porc_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."'");
    $result2=$bd->consultar("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
                from vw_porc_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."'");
}
else    
{
    if(!isset ($_GET["cadena"]))
    {       
        $result=$bd->consultarArray("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`  
                FROM vw_porc_total_consultas_por_enfermedad_y_edad
                WHERE `Año`='".$anno."'");
        $result_total_edad=$bd->consultarArray("SELECT `%0a1`,`%2a4`,`%5a14`,`%Resto` 
                FROM vw_porc_total_consultas_por_edad_anuales
                WHERE `Año`='".$anno."'");
     }
}

/******************** Fin establecer consulta *****************/

echo '<h3>ESTADÍSTICAS ENFERMEDADES - PORCENTAJES ANUALES</h3><br/>';
echo '<h2>'."AÑO ".$anno.'</h2>';

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
    echo '<h2>Porcentajes anuales de enfermedades, clasificados por edad</h2>';
    $rejilla_total_edad=new rejilla_est_enfermedades($result_total_edad);
    echo $rejilla_total_edad->pintar();
}
else	/* Incluir en generador este else */
{
    if (isset($_GET["buscar_cadena"]) && $cadena=="")
    {
        echo '<p class="error">Introduzca el dato que desea buscar.</p>';
    }
    else
    {
        echo '<p class="error">No se ha encontrado ningñn registro.</p>';
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

?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
    <input type="text" name="cadena"/>
    <input class="boton" type="submit" name="buscar" value="Buscar"/>
</form>
</br>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
    <input class="boton" type="submit" name="volver" value="Volver"/>
</form>