<?php
include ("clase_t_control_peso.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$t_control_peso=new t_control_peso();
if(isset($_GET["id"]))
{
    $t_control_peso->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($t_control_peso);
    if($arrayEntidad)
    {
            $t_control_peso->cargar($arrayEntidad[0]);
    }
}
if(isset ($_GET['paciente']))
{
    $paciente=$_GET['paciente'];
}
else
{
    $paciente="";
}
?>

<form name="form_t_control_peso" method="get" action="procesar_t_control_peso.php">
<input type="hidden" name="id" id="id" value="<?php echo $t_control_peso->id; ?>"/>
<input type="hidden" name="paciente" id="paciente" value="<?php echo $paciente; ?>"/>
<table>
<tr>
<td>id</td>
<td>
<input type="text" name="id" id="id" value="<?php echo  $t_control_peso->id; ?>"/>
</td>
</tr>
<tr>
<td>id_nutricion</td>
<td>
<input type="text" name="id_nutricion" id="id_nutricion" value="<?php 
if(isset($_GET["id"]))
{
    echo $t_control_peso->id_nutricion;
}
else
{
    echo $_GET['id_nutricion'];  
}
 ?>"/>
</td>
</tr>
<tr>
<td>Fecha</td>
<td>
<?php 
if(isset($_GET["nuevo"]))
{
    $fecha=date("Y-m-d");
}
else
{
    $fecha=$t_control_peso->fecha;
}
?>
<input type="text" name="fecha" id="fecha" value="<?php echo $fecha; ?>"/>

</td>
</tr>
<tr>
<td>Peso</td>
<td>
<input type="text" name="peso" id="peso" value="<?php echo  $t_control_peso->peso; ?>"/>
</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	<td><input type="submit" name="Borrar" value="Borrar"></td>
	<td><input type="submit" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>
