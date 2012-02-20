<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

	$bd=new bd();
	$result=$bd->consultarArray("select * from t_conceptos");
if($result)
{echo '<p><h3>conceptos<br></h3></p>';
	$rejilla=new rejilla($result,"index.php?cuerpo=form_t_conceptos.php&","id","id");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_t_conceptos.php" />
<input type="submit" name="nuevo" value="Nuevo"/>
</form>