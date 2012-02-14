<?php
include ("clase_menu.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");

$bd=new bd();
$util=new utilidadesIU();
$menu=new menu();
if(isset($_GET["id"]))
    {
    $menu->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($menu);
    if($arrayEntidad)
        {
        $menu->cargar($arrayEntidad[0]);
        }
    }
?>
<h3><u>FORMULARIO MENU</u><br></h3>
<form name="form_menu" method="get" action="procesar_menu.php">
    <input type="hidden" name="id" id="id" value="<?php echo $menu->id; ?>"/>
    <table>
        <tr>
            <td>Padre</td>
            <td>
            <input type="text" name="id_padre" id="id_padre" value="<?php echo  $menu->id_padre; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Enlace</td>
            <td>
            <input type="text" name="enlace" id="enlace" value="<?php echo  $menu->enlace; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Texto</td>
            <td>
            <input type="text" name="texto" id="texto" value="<?php echo  $menu->texto; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input class="boton" type="submit" name="Enviar" value="Enviar"/><?php if(isset ($_GET["id"]) )
                { echo  '<input class="boton" type="submit" name="Borrar" value="Borrar"/>';} ?></td>
            <td><input class="boton" type="submit" name="Cancelar" value="Cancelar"/></td>
        </tr>
    </table>
</form>