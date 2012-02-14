<?php
include ("clase_rejilla_pacientes.php");
include_once ("clase_bd.php");

$bd=new bd();
if(isset ($_GET["todos"]))
    {
    $result=$bd->consultarArray("select * from vw_rejilla_pacientes");
    }
elseif(isset ($_GET["buscar_carnet"]))
    {
    $carnet=$_GET["carnet"];
    $result=$bd->consultarArray("select * from vw_rejilla_pacientes where `Numero de Carnet`='".$carnet."'");
    }    
elseif(isset ($_GET["buscar"]))
    {
    $cadena=$_GET["cadena"];
    $result=$bd->consultarArray("SELECT * from vw_rejilla_pacientes 
        where Paciente like '%".$cadena."%' or `Nombre de la Madre` like '%".$cadena."%'");
    }    
else
    {
    $result=$bd->consultarArray("select * from vw_rejilla_pacientes order by Paciente limit 10");
    }    
if($result)
    {
    echo '<h3>REJILLA PACIENTES</h3><br/>';
    $rejilla=new rejilla_pacientes($result,"index.php?cuerpo=form_pacientes.php&","id","Paciente");
    echo $rejilla->pintar();
    }
    
    if(isset ($_GET['msj2'])&& $_GET['msj2']!="")//Incluir en Generador
    {                                             //Incluir en Generador  
    echo '<p>'.$_GET['msj2'].'</p>';              //Incluir en Generador
    }
if(isset ($_GET["buscar"]) or isset ($_GET["todos"]) or isset ($_GET["buscar_carnet"]))
    {
    echo '<form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="rejilla_pacientes.php" />
        <br/><input class="boton" type="submit" name="Cancelar" value="Cancelar"/>
        </form><br/>';
    }
else 
    {
    echo '<form action="index.php" method="get">
        <br/>Buscar
        <input type="text" name="cadena"/>
        <input type="hidden" name="cuerpo" value="rejilla_pacientes.php" />
        <input class="boton" type="submit" name="buscar" value="Buscar"/>
        </form>
        <form action="index.php" method="get">
        <br/>Buscar Nº de carnet
        <input type="text" name="carnet"/>
        <input type="hidden" name="cuerpo" value="rejilla_pacientes.php" />
        <input class="boton" type="submit" name="buscar_carnet" value="Buscar"/>
        </form>
        <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="rejilla_pacientes.php" />
        <br/><input class="boton" type="submit" name="todos" value="Ver Todos"/>
        </form>
        <form action="index.php" method="get">
        <input type="hidden" name="cuerpo" value="form_pacientes.php" />
        <br/><input class="boton" type="submit" name="nuevo" value="Nuevo"/>
        </form><br/><br/>';
    }
    
                                                 //Incluir en Generador  
?>    