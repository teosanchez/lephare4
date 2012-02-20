<?php
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

?>

<h3>ESTADÍSTICAS ENFERMEDADES - CRITERIOS DE SELECCIÓN</h3>
</br></br></br></br></br></br>
<form action="index.php" method="get">
    <input type="hidden" name="cuerpo" value="procesar_est_enf.php"/>
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
    </br></br></br>

    
    <input class="boton" type="submit" name="est_mensuales" value="Ver Estadísticas Mensuales"/>
    
    <input class="boton" type="submit" name="porc_mensuales" value="Ver Porcentajes Mensuales"/>
    </br></br>
    <input class="boton" type="submit" name="est_anuales" value="Ver Estadísticas Anuales"/>
    
    <input class="boton" type="submit" name="porc_anuales" value="Ver Porcentajes Anuales"/>
</form>



