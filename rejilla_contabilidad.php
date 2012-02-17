<?php
include ("clase_rejilla.php");
include_once ("clase_bd.php");

	$bd=new bd();
	$result=$bd->consultarArray("select * from contabilidad");
if($result)
{echo '<p><h3>contabilidad<br></h3></p>';
	$rejilla=new rejilla($result,"index.php?cuerpo=form_contabilidad.php&","id","id");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_contabilidad.php" />
<input type="submit" name="nuevo" value="Nuevo Asiento"/>
</form>