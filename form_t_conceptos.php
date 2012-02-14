<?php
include ("clase_t_conceptos.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$t_conceptos=new t_conceptos();
if(isset($_GET["id"]))
{
$t_conceptos->id=($_GET["id"]);
$arrayEntidad=$bd->buscar($t_conceptos);
if($arrayEntidad)
{
	$t_conceptos->cargar($arrayEntidad[0]);
}
}
?>

<form name="form_t_conceptos" method="get" action="procesar_t_conceptos.php">
<input type="hidden" name="id" id="id" value="<?php echo $t_conceptos->id; ?>"/>
<table>

<tr>
<td>nombre</td>
<td>
<input type="text" name="nombre" id="nombre" value="<?php echo  $t_conceptos->nombre; ?>"/>
</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	<td><input type="submit" name="Borrar" value="Borrar"></td>
	<td><input type="submit" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>