<?php
include ("clase_visitas.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
include("clase_citas.php");
$bd=new bd();
$util=new utilidadesIU();
$visitas=new visitas();
if(isset($_GET["id"]))
    {
    $visitas->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($visitas);
    if($arrayEntidad)
        {
        $visitas->cargar($arrayEntidad[0]);
        }
    }
 else
     {
     if(isset ($_GET['id_cita']))
        {
         $cita=new citas();
         $cita->id=$_GET ['id_cita'];
         $arrayCita=$bd->buscar($cita);
         $cita->cargar($arrayCita[0]);
         $visitas->id_medico=$cita->id_medico;
         $visitas->id_paciente=$cita->id_paciente;
        }
     }   
?>
<h3><u>FORMULARIO VISITAS</u><br></h3>
<form name="form_visitas" method="get" action="procesar_visitas.php">
    <input type="hidden" name="id" id="id" value="<?php echo $visitas->id; ?>"/>
    <?php
        if(isset ($_GET["id_cita"]))
            {
            echo '<input type="hidden" name="id_cita" id="id_cita" value="'.$cita->id.'"/>';
            }
    ?>
    <table>
        <tr>
            <td>Paciente</td>
            <td>
            <?php
                $datosLista=$bd->consultar("select concat(pacientes.apellidos,',  ',pacientes.nombre) AS Paciente,id from pacientes");
                echo $util->pinta_selection($datosLista,"id_paciente","Paciente",$visitas->id_paciente);
            ?>
            </td>
        </tr>
        <tr>
            <td>Medico</td>
            <td>
            <?php
               $datosLista=$bd->consultar("select concat(medicos.apellidos,',  ',medicos.nombre) AS Medico,id from medicos");
               echo $util->pinta_selection($datosLista,"id_medico","Medico",$visitas->id_medico);
            ?>
            </td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td>
            <input type="text" name="fecha" id="fecha" value="<?php echo  $visitas->fecha; ?>"/>
            </td>
            </tr>
        <tr>
            <td>Tarifa de consulta</td>
            <td>
            <input type="text" name="tarifa_consulta" id="tarifa_consulta" value="<?php echo  $visitas->tarifa_consulta; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Tarifa de diabetes</td>
            <td>
            <input type="text" name="tarifa_diabetes" id="tarifa_diabetes" value="<?php echo  $visitas->tarifa_diabetes; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Tarifa de medicamentos</td>
            <td>
            <input type="text" name="tarifa_medicamentos" id="tarifa_medicamentos" value="<?php echo  $visitas->tarifa_medicamentos; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Diagnostico</td>
            <td>
            <input type="text" name="diagnostico" id="diagnostico" value="<?php echo  $visitas->diagnostico; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Medicamentos</td>
            <td>
            <input type="text" name="medicamentos" id="medicamentos" value="<?php echo  $visitas->medicamentos; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(!isset ($_GET["id_cita"]) && isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>