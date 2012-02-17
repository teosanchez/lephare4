<?php
	include ("clase_nutricion.php");
	include_once ("clase_bd.php");

	$nutricion=new nutricion();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["id"]))
		{
			 $nutricion->id=$_GET["id"];
			 $nutricion->id_paciente=$_GET["id_paciente"];
			 $nutricion->fecha_ingreso=$_GET["fecha_ingreso"];
			 $nutricion->peso_ingreso=$_GET["peso_ingreso"];
			 $nutricion->peso_nacimiento=$_GET["peso_nacimiento"];
			 $nutricion->peso_alta=$_GET["peso_alta"];
			 $nutricion->enfermedad=$_GET["enfermedad"];
			 $nutricion->fecha_muerte=$_GET["fecha_muerte"];
			 $nutricion->fecha_alta=$_GET["fecha_alta"];
			 $nutricion->reenvio_hospital=$_GET["reenvio_hospital"];
		if($_GET["id"]=="")
		{
			$bd->insertar($nutricion);
		}
		 else
		{
			$bd->actualizar($nutricion);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$nutricion->id=$_GET["id"];
		$bd->borrar($nutricion);
	 }
	 header('Location: index.php?cuerpo=rejilla_nutricion.php');
?>