<?php
include ("clase_citas.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$citas=new citas();
if(isset($_GET["id"]))
    {
    $citas->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($citas);
    if($arrayEntidad)
        {
	$citas->cargar($arrayEntidad[0]);
        }
    }
?>
<h3><u>FORMULARIO CITAS</u><br></h3>
<form name="form_citas" method="get" action="procesar_citas.php">
    <input type="hidden" name="id" id="id" value="<?php echo $citas->id; ?>"/>
    <table>
        <tr>
            <td>Paciente</td>
            <td>
                <?php 
                $datosLista=$bd->consultar("select concat(pacientes.apellidos,',  ',pacientes.nombre) AS Paciente,id from pacientes");
                echo $util->pinta_selection($datosLista,"id_paciente","Paciente",$citas->id_paciente);
                ?>
            </td>
        </tr>
        <tr>
            <td>Médico</td>
            <td>
               <?php
               $datosLista=$bd->consultar("select concat(medicos.apellidos,',  ',medicos.nombre) AS Medico,id from medicos");
               echo $util->pinta_selection($datosLista,"id_medico","Medico",$citas->id_medico);
               ?>
            </td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>
            <input type="text" name="fecha" id="fecha" value="<?php echo  $citas->fecha; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Hora</td>
            <td>
            <input type="text" name="hora" id="hora" value="<?php echo  $citas->hora; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Comentarios</td>
            <td>
            <input type="text" name="comentarios" id="comentarios" value="<?php echo  $citas->comentarios; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>