<?php
	include ("clase_t_conceptos.php");
	include_once ("clase_bd.php");

	$t_conceptos=new t_conceptos();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["id"]))
		{
			 $t_conceptos->id=$_GET["id"];
			 $t_conceptos->nombre=$_GET["nombre"];
		if($_GET["id"]=="")
		{
			$bd->insertar($t_conceptos);
		}
		 else
		{
			$bd->actualizar($t_conceptos);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$t_conceptos->id=$_GET["id"];
		$bd->borrar($t_conceptos);
	 }
	 header('Location: index.php?cuerpo=rejilla_t_conceptos.php');
?>