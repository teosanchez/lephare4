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

<<<<<<< HEAD
=======
$nom_meses=array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO',
            'JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');

>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
if (isset ($_GET["Años"]))
    {
        $anno = $_GET["Años"];
    }
else
    {
        $anno=date("Y");
    }
    
<<<<<<< HEAD
/***********  Fin Cálculo de $anno ***************/
=======
/*if (isset ($_GET["Meses"]))
    {
        $indice_mes = $_GET["Meses"]-1;
    }
else
    {
        $indice_mes=date("n")-1;
   }
$mes=$nom_meses[$indice_mes]; // Cuando tenga valores la tabla, lo activaré y quitaré los otros
$id_mes=$indice_mes+1;*/
$id_mes=1;
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
                            FROM vw_porc_total_consultas_por_enfermedad_y_edad
                            WHERE `Año`='".$anno."'");

$total_registros=mysql_num_rows($resultados);
$total_paginas=ceil($total_registros / $registros);
/*********** Fin Paginacion ***************/
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b

/*********** Establecer consulta ***************/
$cadena="";
$result="";
<<<<<<< HEAD
$result2="";    /* Incluir en generador el cñlculo de $result2 */
if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"") //Evalua si existe esta variable y si viene con algun contenido, la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
=======
$result2="";    /* Incluir en generador el cálculo de $result2 */
if(isset ($_GET["cadena"]) && $_GET["cadena"]<>"") //Evalua si existe esta variable y si viene con algun contenido, la cual procede del cuadro de texto que esta junto al boton Buscar de uno de los formularios
{
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
                from vw_porc_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."'");
<<<<<<< HEAD
    $result2=$bd->consultar("SELECT Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
=======
    $result2=$bd->consultar("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
                from vw_porc_total_consultas_por_enfermedad_y_edad
                where Enfermedad like '%".$cadena."%'
                or Mes like '%".$cadena."%'
                and `Año`='".$anno."'");
}
else    
{
    if(!isset ($_GET["cadena"]))
<<<<<<< HEAD
    {       
        $result=$bd->consultarArray("SELECT Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`  
                FROM vw_porc_total_consultas_por_enfermedad_y_edad
                WHERE `Año`='".$anno."'");
        $result_total_edad=$bd->consultarArray("SELECT `%0a1`,`%2a4`,`%5a14`,`%Resto` 
                FROM vw_porc_total_consultas_por_edad_anuales
                WHERE `Año`='".$anno."'");
     }
=======
    {       /*paginacion */
        $result=$bd->consultarArray("SELECT Mes,Enfermedad,Sexo,`%0a1`,`%2a4`,`%5a14`,`%Resto`  
                FROM vw_porc_total_consultas_por_enfermedad_y_edad
                WHERE `Año`='".$anno."'
                LIMIT $inicio, $registros");
        $result_total_edad=$bd->consultarArray("SELECT `%0a1`,`%2a4`,`%5a14`,`%Resto` 
                FROM vw_porc_total_consultas_por_edad
                WHERE `Año`='".$anno."' 
                LIMIT $inicio, $registros");
        // Esta consulta no tiene sentido, será siempre 100%
        /*$result_total=$bd->consultarArray("SELECT Total
                FROM vw_porc_total_consultas_por_edad
                WHERE `Año`='".$anno."' and Mes='".$mes."'
                LIMIT $inicio, $registros");*/
    }
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
}

/******************** Fin establecer consulta *****************/

echo '<h3>ESTADÍSTICAS ENFERMEDADES - PORCENTAJES ANUALES</h3><br/>';
echo '<h2>'."AÑO ".$anno.'</h2>';

if($result)
{
    $rejilla=new rejilla_est_enfermedades($result);
<<<<<<< HEAD
    echo $rejilla->pintar2();
=======
    echo $rejilla->pintar();
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b

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
<<<<<<< HEAD
    echo '<h2>Porcentajes anuales de enfermedades, clasificados por edad</h2>';
    $rejilla_total_edad=new rejilla_est_enfermedades($result_total_edad);
    echo $rejilla_total_edad->pintar2();
=======
    //$rejilla_total_edad=new rejilla_est_enfermedades($result_total_edad);
    //echo $rejilla_total_edad->pintar2();
    //$rejilla_total=new rejilla_est_enfermedades($result_total);
    //echo $rejilla_total->pintar3();
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
}
else	/* Incluir en generador este else */
{
    if (isset($_GET["buscar_cadena"]) && $cadena=="")
    {
        echo '<p class="error">Introduzca el dato que desea buscar.</p>';
    }
    else
    {
<<<<<<< HEAD
        echo '<p class="error">No se ha encontrado ningñn registro.</p>';
=======
        echo '<p class="error">No se ha encontrado ningún registro.</p>';
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
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

<<<<<<< HEAD
?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
=======
     /*********** Paginacion ***************/
if(($pagina-1) > 0) 
       {
       echo "<a href='index.php?cuerpo=rejilla_porc_enf_anuales.php&pagina=".($pagina-1)."'>< Anterior</a> ";    
       }    
   for ($i=1; $i<=$total_paginas; $i++)
       {
       if ($pagina == $i)
           {    
           echo "<b>".$pagina."</b> ";
           }
        else 
           {
           echo "<a href='index.php?cuerpo=rejilla_porc_enf_anuales.php
                &pagina=$i'>$i</a>&nbsp;";
           } 
        }   
   if(($pagina + 1)<=$total_paginas)
       {
       echo " <a href='index.php?cuerpo=rejilla_porc_enf_anuales.php
           &pagina=".($pagina+1)."'>Siguiente ></a>";
       }
 
 /*********** Fin Paginacion ***************/
?>

<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="rejilla_porc_enf_anuales.php"/>
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
    <input type="text" name="cadena"/>
    <input class="boton" type="submit" name="buscar" value="Buscar"/>
</form>
</br>

<form action="index.php" method="get">
<<<<<<< HEAD
    <input type="hidden" name="cuerpo" value="criterios_est_enf.php"/>
    <input class="boton" type="submit" name="volver" value="Volver"/>
</form>
=======
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
>>>>>>> 524a39d1d31180923aeb50f9f6afd7f6451b992b
