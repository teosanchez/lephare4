<?php
	include ("clase_contabilidad.php");
	include_once ("clase_bd.php");

	$contabilidad=new contabilidad();
	$bd=new bd();
	if(isset($_GET["Enviar"])) 
	{
	 if(isset($_GET["id"]))
		{
			 $contabilidad->id=$_GET["id"];
			 $contabilidad->id_visita=$_GET["id_visita"]==""?null:$_GET["id_visita"];
			 $contabilidad->id_concepto=$_GET["id_concepto"];
			 $contabilidad->fecha=$_GET["fecha"];
			 $contabilidad->cantidad=$_GET["cantidad"];
			 $contabilidad->tipo=$_GET["tipo"];
			 $contabilidad->descripcion=$_GET["descripcion"];
		if($_GET["id"]=="")
		{
                    //var_dump($contabilidad);
			$bd->insertar($contabilidad);
		}
		 else
		{
			$bd->actualizar($contabilidad);
		}
	}
	}
	if(isset($_GET["Borrar"])) 
		{
		$contabilidad->id=$_GET["id"];
		$bd->borrar($contabilidad);
	 }
	 header('Location: index.php?cuerpo=rejilla_contabilidad.php');
?>