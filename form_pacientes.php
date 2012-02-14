<?php
include ("clase_pacientes.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
$bd=new bd();
$util=new utilidadesIU();
$pacientes=new pacientes();
if(isset($_GET["id"]))
    {
    $pacientes->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($pacientes);
    if($arrayEntidad)
        {
        $pacientes->cargar($arrayEntidad[0]);
        }
    }
else
    {
    $consulta=$bd->consultar("SELECT `numero_carnet` FROM `pacientes` order by `numero_carnet` desc limit 1");
    $consulta=mysql_fetch_array($consulta);                       
    $resultado=$consulta['numero_carnet'];
    $num_carnet=$resultado+1;    
    }    
?>
<h3><u>FORMULARIO PACIENTE</u><br></h3>
<form name="form_pacientes" method="get" action="procesar_pacientes.php">
    <input type="hidden" name="id" id="id" value="<?php echo $pacientes->id; ?>"/>
    <table>
        <tr>
            <td>Nombre</td>
            <td>
            <input type="text" name="nombre" id="nombre" value="<?php echo  $pacientes->nombre; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo  $pacientes->apellidos; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Numero de carnet</td>
            <td>
            <input type="text" name="numero_carnet" readonly="readonly" id="numero_carnet" value="<?php if(isset($_GET["id"])){echo  $pacientes->numero_carnet;}
            else {echo  $num_carnet;}?>"/>
            </td>
        </tr>
        <tr>
            <td>Fecha de nacimiento</td>
            <td>
            <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo  $pacientes->fecha_nacimiento; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Sexo</td>
            <td>
            <input type="text" name="sexo" id="sexo" value="<?php echo  $pacientes->sexo; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Nombre de la madre</td>
            <td>
            <input type="text" name="nombre_madre" id="nombre_madre" value="<?php echo  $pacientes->nombre_madre; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>
            <input type="text" name="telefono" id="telefono" value="<?php echo  $pacientes->telefono; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Barrio</td>
            <td>
            <input type="text" name="barrio" id="barrio" value="<?php echo  $pacientes->barrio; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Distancia</td>
            <td>
            <input type="text" name="distancia" id="distancia" value="<?php echo  $pacientes->distancia; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>
<form name="form_carnet" method="get" action="carnet.php">
 <input type="hidden" name="id" id="id" value="<?php echo $pacientes->id; ?>"/>
 <?php if(isset ($_GET["id"])){ echo '<input class="boton" type="submit" name="Imprimir" value="Imprimir Carnet"/>';} ?>
</form>