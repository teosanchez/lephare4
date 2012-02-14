<?php
include ("clase_t_enfermedades.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
$bd=new bd();
$util=new utilidadesIU();
$t_enfermedades=new t_enfermedades();
if(isset($_GET["id"]))
    {
    $t_enfermedades->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($t_enfermedades);
    if($arrayEntidad)
        {
        $t_enfermedades->cargar($arrayEntidad[0]);
        }
    }
?>
<h3><u>FORMULARIO ENFERMEDAD</u><br></h3>
<form name="form_t_enfermedades" method="get" action="procesar_t_enfermedades.php">
    <input type="hidden" name="id" id="id" value="<?php echo $t_enfermedades->id; ?>"/>
    <table>
        <tr>
            <td>Enfermedad</td>
            <td>
            <input type="text" name="enfermedad" id="enfermedad" value="<?php echo  $t_enfermedades->enfermedad; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>