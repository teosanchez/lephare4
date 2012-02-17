<?php 
if (isset($_GET["cuerpo"]))
    {
    $cuerpo=$_GET["cuerpo"];
    }
else
    {
    $cuerpo="rejilla_citas.php";
    }
include ($cuerpo);
?>