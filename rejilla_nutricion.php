<?php
include ("clase_rejilla_nutricion.php");
include_once ("clase_bd.php");

	$bd=new bd();
	$result=$bd->consultarArray("select * from vw_rejilla_nutricion");
        
if($result)
{echo '<p><h1>nutricion<br></h1></p>';
	$rejilla=new rejilla($result,"index.php?cuerpo=form_nutricion.php&","id","Paciente");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_nutricion.php" />
<input type="submit" name="nuevo" value="Nuevo"/>
</form>