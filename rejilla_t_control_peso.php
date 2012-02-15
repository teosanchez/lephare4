<?php
include ("clase_rejilla_control_peso.php");
include_once ("clase_bd.php");

$bd=new bd();

if(isset($_GET["id_nutricion"]))
{
    $id_nutricion=$_GET["id_nutricion"];
    $result=$bd->consultarArray("select * from t_control_peso WHERE id_nutricion='.$id_nutricion.'");
}
else
{
    $result=$bd->consultarArray("select * from t_control_peso");
    $id_nutricion="";
}
if($result)
{
        echo '<p><h1>Contro de peso<br></h1></p>';
        if(isset ($_GET["paciente"]))
        {
            $paciente=$_GET["paciente"];
            echo "Paciente: ".$paciente;
        }
	$rejilla=new rejilla($result,"index.php?cuerpo=form_t_control_peso.php&paciente=".$paciente."&","id","fecha");
	echo $rejilla->pintar();
}
?>
<form action="index.php" method="get">
<input type="hidden" name="cuerpo" value="form_t_control_peso.php"/>
<input type="hidden" name="id_nutricion" value="<?php echo $id_nutricion; ?>"/>
<input type="hidden" name="paciente" value="<?php echo $paciente; ?>"/>
<input type="submit" name="nuevo" value="Nuevo"/>
</form>