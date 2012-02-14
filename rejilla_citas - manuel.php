<?php
include ("clase_rejilla_citas.php");
include_once ("clase_bd.php");
$bd=new bd();

/*********** Establecer consulta ***************/
$result2="";    /* Incluir en generador el cálculo de $result2 */
if (isset ($_GET["todos"]))
    {
    $result=$bd->consultarArray("select * from vw_rejilla_citas");
    }
else
    {
        if(isset ($_GET["buscar_fecha"]))
        {
        $fecha=$_GET["fecha"];
        $result=$bd->consultarArray("select * from vw_rejilla_citas where Fecha='".$fecha."'");
        $result2=$bd->consultar("select * from vw_rejilla_citas where Fecha='".$fecha."'");
        }
        else
        {
            if(isset ($_GET["buscar_cadena"]))
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
                $result=$bd->consultarArray("select * from vw_rejilla_citas 
                                             order by fecha desc limit 10");
            }   
        }
    }
/******************** Fin establecer consulta *****************/
echo '<h3>FICHERO CITAS</h3><br/>';

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
    
if(isset ($_GET['msj'])&& $_GET['msj']!="")
    {
    echo '<p>Error: '.$_GET['msj'].'</p>';
    }
  if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
    {                                           //Incluir en Generador
    echo '<p>'.$_GET['msj2'].'</p>';            //Incluir en Generador
    }                                           //Incluir en Generador
if(isset ($_GET["buscar_fecha"]) or isset ($_GET["todos"]) or isset ($_GET["buscar_cadena"])  )
    {
    echo '<td><form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="rejilla_citas.php" />
        <br/><input class="boton" type="submit" name="Cancelar" value="Cancelar"/>
        </form><br/></td>';
    }
else 
    {
    echo '<form action="index.php" method="get">
        <br/>Buscar Fecha
        <input type="text" name="fecha"/>
        <input type="hidden" name="cuerpo" value="rejilla_citas.php" />
        <input class="boton" type="submit" name="buscar_fecha" value="Buscar"/>
        </form>
        <form action="index.php" method="get">
        <br/>Buscar
        <input type="text" name="cadena"/>
        <input type="hidden" name="cuerpo" value="rejilla_citas.php" />
        <input class="boton" type="submit" name="buscar_cadena" value="Buscar"/>
        </form>
        <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="rejilla_citas.php" />
        <br/><input class="boton" type="submit" name="todos" value="Ver Todos"/>
        </form>
        <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_citas.php" />
        <br/><input class="boton" type="submit" name="nuevo" value="Nuevo"/>
        </form><br/><br/>';
    }
?>