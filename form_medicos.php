<?php
include ("clase_medicos.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$medicos=new medicos();
if(isset($_GET["id"]))
    {
    $medicos->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($medicos);
    if($arrayEntidad)
        {
	$medicos->cargar($arrayEntidad[0]);
        }
    }
?>
<h3><u>FORMULARIO MEDICO</u><br></h3>
<form name="form_medicos" method="get" action="procesar_medicos.php">
    <input type="hidden" name="id" id="id" value="<?php echo $medicos->id; ?>"/>
    <table>
        <tr>
            <td>Nombre</td>
            <td>
            <input type="text" name="nombre" id="nombre" value="<?php echo  $medicos->nombre; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo  $medicos->apellidos; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>
            <input type="text" name="telefono" id="telefono" value="<?php echo  $medicos->telefono; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>