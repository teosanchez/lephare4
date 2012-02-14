<?php
include ("clase_contabilidad.php");
include ("utilidadesIU.php");
include_once ("clase_bd.php");
include_once ("clase_t_conceptos.php");

$bd=new bd();
$util=new utilidadesIU();
$contabilidad=new contabilidad();
if(isset($_GET["id"]))
{
    $contabilidad->id=($_GET["id"]);
    $arrayEntidad=$bd->buscar($contabilidad);
    if($arrayEntidad)
    {
            $contabilidad->cargar($arrayEntidad[0]);
    }
} else{
    $concepto=new t_conceptos();         
    $arrayConcepto=$bd->buscar($concepto);
    $concepto->cargar($arrayConcepto[0]);
    $concepto->id =$contabilidad->id_concepto;
}
?>

<form name="form_contabilidad" method="get" action="procesar_contabilidad.php">
<input type="hidden" name="id" id="id" value="<?php echo $contabilidad->id; ?>"/>
<table>



<input type="hidden" name="id_visita" id="id_visita" value="<?php echo  $contabilidad->id_visita; ?>"/>


<tr>
<td>Concepto</td>
<td>
<?php
    $datosLista=$bd->consultar("SELECT DISTINCT t_conceptos.id, t_conceptos.nombre FROM t_conceptos, contabilidad WHERE t_conceptos.id = contabilidad.id_concepto");
    echo $util->pinta_selection($datosLista,"id_concepto","nombre", $contabilidad->id_concepto);
 ?>
</td>
</tr>
<tr>
<td>Fecha</td>
<td>
<input type="text" name="fecha" id="fecha" value="<?php echo  $contabilidad->fecha; ?>"/>
</td>
</tr>
<tr>
<td>Cantidad</td>
<td>
<input type="text" name="cantidad" id="cantidad" value="<?php echo  $contabilidad->cantidad; ?>"/>
</td>
</tr>
<tr>
<td>Tipo</td>
<td>
    <select name="tipo">
        <option value="0">Ingreso</option>
        <option value="1">Gasto</option>
    </select>
</td>
</tr>
<tr>
<td>Descripción</td>
<td>
    
<textarea rows="2" cols="20" name="descripcion" id="descripcion" value="">
<?php echo  $contabilidad->descripcion;?>
</textarea>

</td>
</tr>
<tr>
	<td><input type="submit" name="Enviar" value="Enviar"></td>
	<td><input type="submit" name="Borrar" value="Borrar"></td>
	<td><input type="submit" name="Cancelar" value="Cancelar"></td>
        </tr>
     </table>
     </form>