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

/*********** Cálculo de $anno y $mes  ***************/


$nom_meses=$bd->consultarArray("select nom_mes from t_meses");

$nom_meses=array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO',
            'JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');


if (isset ($_GET["Años"]))
    {
        $anno = $_GET["Años"];
    }
else
    {
        $anno=date("Y");
    }
if (isset ($_GET["Meses"]))
    {
        $indice_mes = $_GET["Meses"]-1;
    }
else
    {
        $indice_mes=date("n")-1;
   }

$mes=$nom_meses[$indice_mes]['nom_mes'];
$id_mes=$indice_mes+1;
/***********  Fin Cálculo de $anno y $mes  ***************/


$mes=$nom_meses[$indice_mes]; // Cuando tenga valores la tabla, lo activaré y quitaré los otros
$id_mes=$indice_mes+1;
/***********  Fin Cálculo de $anno y $mes  ***************/

/*********** Paginacion ***************/
$registros=10;
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
$resultados=$bd->consultar("SELECT * 
                            FROM vw_total_consultas_por_enfermedad_y_edad
                            WHERE `Año`='".$anno."' and Mes='".$mes."'");

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
    $result=$bd->consultarArray("SELECT Enfermedad,Sexo,0a1,2a4,5a14,Resto
                from vw_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."' 
                and Mes = '".$mes."'");
    $result2=$bd->consultar("SELECT Enfermedad,Sexo,0a1,2a4,5a14,Resto
                from vw_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."' 
                and Mes = '".$mes."'");
}
else    
{
    if(!isset ($_GET["cadena"]))

    {       
        $result=$bd->consultarArray("SELECT Enfermedad,Sexo,0a1,2a4,5a14,Resto 
                FROM vw_total_consultas_por_enfermedad_y_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'");
        $result_total_edad=$bd->consultarArray("SELECT 0a1,2a4,5a14,Resto,Total 
                FROM vw_total_consultas_por_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'");
        

    {       /*paginacion */
        $result=$bd->consultarArray("SELECT Enfermedad,Sexo,0a1,2a4,5a14,Resto 
                FROM vw_total_consultas_por_enfermedad_y_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'
                LIMIT $inicio, $registros");
        $result_total_edad=$bd->consultarArray("SELECT 0a1,2a4,5a14,Resto 
                FROM vw_total_consultas_por_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'
                LIMIT $inicio, $registros");
        $result_total=$bd->consultarArray("SELECT Total
                FROM vw_total_consultas_por_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'
                LIMIT $inicio, $registros");

    }
}

/******************** Fin establecer consulta *****************/

echo '<h3>ESTADÍSTICAS ENFERMEDADES - MENSUALES</h3><br/>';
echo '<h2>'.$mes." ".$anno.'</h2>';

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

    //var_dump($result_total_edad);
    echo '<h2>Total de enfermedades mensuales, clasificadas por edad</h2>';
    $rejilla_total_edad=new rejilla_est_enfermedades($result_total_edad);
    echo $rejilla_total_edad->pintar();
    

    //$rejilla_total_edad=new rejilla_est_enfermedades($result_total_edad);
    //echo $rejilla_total_edad->pintar2();
    //$rejilla_total=new rejilla_est_enfermedades($result_total);
    //echo $rejilla_total->pintar3();

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


?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
<?php
     /*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_est_enf_mensuales.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_est_enf_mensuales.php&pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_est_enf_mensuales.php&pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 
 /*********** Fin Paginacion ***************/
?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_est_enf_mensuales.php"/>

    <input type="text" name="cadena"/>
    <input class="boton" type="submit" name="buscar" value="Buscar"/>
</form>
</br>

<form action="index.php" method="get">

    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
    <input class="boton" type="submit" name="volver" value="Volver"/>
</form>

    <input type="hidden" name="cuerpo" value="rejilla_est_enf_mensuales.php"/>
    Seleccione un Mes:
    <?php
        $datosLista=$bd->consultar("select * from t_meses");
        echo $util->pinta_selection($datosLista,"Meses","nom_mes",$id_mes);
    ?>
        Seleccione un Año:
    <?php
        $datosLista=$bd->consultar("select * from vw_lista_annos");
        echo $util->pinta_selection2($datosLista,"Años","Año",$anno);
    ?>
<input class="boton" type="submit" name="est_mensuales" value="Ver Estadísticas Mensuales"/>
</form>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_porc_enf_mensuales.php"/>
    Seleccione un Mes:
    <?php
        $datosLista=$bd->consultar("select * from t_meses");
        echo $util->pinta_selection($datosLista,"Meses","nom_mes",$id_mes);
    ?>
    Seleccione un Año:
    <?php
        $datosLista=$bd->consultar("select * from vw_lista_annos");
        echo $util->pinta_selection2($datosLista,"Años","Año",$anno);
    ?>
    <input class="boton" type="submit" name="porc_mensuales" value="Ver Porcentajes Mensuales"/>
</form>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_est_enf_anuales.php"/>
    Seleccione un Año:
    <?php
        $datosLista=$bd->consultar("select * from vw_lista_annos");
        echo $util->pinta_selection2($datosLista,"Años","Año",$anno);
    ?>
    <input class="boton" type="submit" name="est_anuales" value="Ver Estadísticas Anuales"/>
</form>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_porc_enf_anuales.php"/>
    Seleccione un Año:
    <?php
        $datosLista=$bd->consultar("select * from vw_lista_annos");
        echo $util->pinta_selection2($datosLista,"Años","Año",$anno);
    ?>
   <input class="boton" type="submit" name="porc_anuales" value="Ver Porcentajes Anuales"/>
</form>

