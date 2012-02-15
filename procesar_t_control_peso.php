<?php
	include ("clase_t_control_peso.php");
	include_once ("clase_bd.php");

	$t_control_peso=new t_control_peso();
	$bd=new bd();
        
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["id"]))
		{
			 $t_control_peso->id=$_GET["id"];
			 $t_control_peso->id_nutricion=$_GET["id_nutricion"];
			 $t_control_peso->fecha=$_GET["fecha"];
			 $t_control_peso->peso=$_GET["peso"];
		if($_GET["id"]=="")
		{
			$bd->insertar($t_control_peso);
		}
		 else
		{
			$bd->actualizar($t_control_peso);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$t_control_peso->id=$_GET["id"];
		$bd->borrar($t_control_peso);
	 }
         /*if(isset($_GET["Cancelar"])) 
		{
		$id_nutricion=$_GET["id_nutricion"];
	 }*/
         if(isset($_GET["paciente"])) 
		{
		$paciente=$_GET["paciente"];
	 }
	 header("Location: index.php?cuerpo=rejilla_t_control_peso.php&id_nutricion=".$_GET["id_nutricion"]."&paciente=".$paciente);
?>