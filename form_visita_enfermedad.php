<?php
include ("clase_visita_enfermedad.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$visita_enfermedad=new visita_enfermedad();
if(isset($_GET["id"]))
    {
    $visita_enfermedad->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($visita_enfermedad);
    if($arrayEntidad)
        {
        $visita_enfermedad->cargar($arrayEntidad[0]);
        }
    }
?>
<h3><u>FORMULARIO VISITA Y ENFERMEDAD</u><br></h3>
<form name="form_visita_enfermedad" method="get" action="procesar_visita_enfermedad.php">
    <input type="hidden" name="id" id="id" value="<?php echo $visita_enfermedad->id; ?>"/>
    <table>
        <tr>
            <td>Visita</td>
            <td>
            <input type="text" name="id_visita" id="id_visita" value="<?php echo  $visita_enfermedad->id_visita; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Enfermedad</td>
            <td>
            <?php
            $datosLista=$bd->consultar("select * from t_enfermedades");
            echo $util->pinta_selection($datosLista,"id_enfermedad","id",$visita_enfermedad->id_enfermedad);
            ?>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>