<?php 
include_once ('clase_bd.php') ;
$bd=new bd();
$id=$_GET['id'];
$consulta=$bd->consultar("SELECT *,concat(pacientes.apellidos,', ',pacientes.nombre) AS Paciente FROM pacientes where id='".$id."'");
$edad=$bd->consultar("SELECT floor (DATEDIFF(now(),`fecha_nacimiento`)/365) as Edad from pacientes where id='".$id."'");
if($consulta)
    {
    $fila=mysql_fetch_array($consulta); 
    }
else
    {
    echo "El registro no existe!!!!";
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilos_carnet.css"/>
        <style media='print'>
            input{display:none;} /* esto oculta los input cuando imprimes */
        </style>
    </head>
    <body>
        <div id="carnet">        
                <div id="cabecera">
                    <img src="imagenes/cabecera_carnet.png" alt="Logo DCPM"/><br/>
                    <span>Dispensaire "Le Phare" dar Naim secteur 18</span>
                </div>        
                <div id="cuerpo">  
                    <div class="espaciado"> 
                        <span>Numero de Carnet:</span>
                        <?php echo  $fila['numero_carnet']; ?>
                    </div> 
                    <div class="espaciado"> 
                        <span>Apellidos y Nombre:</span>                   
                        <?php echo $fila['Paciente'];?>                    
                    </div>
                    <div id="foto">
                        <div id="texto_foto">
                        <span>Espacio<br/> para<br/> foto<br/>                   
                        </div>
                    </div>
                    <div class="espaciado">                   
                        <span>Nombre de Madre:</span>
                        <?php echo  $fila['nombre_madre']; ?>                   
                    </div>                    
                    <div class="espaciado">                   
                        <span>Edad:</span>
                        <?php 
                            $edad=mysql_fetch_array($edad);                       
                            echo $edad['Edad'];
                        ?>                   
                    </div> 
                    <div class="espaciado">                   
                        <span>Sexo:</span>
                        <?php echo  $fila['sexo']; ?>                   
                    </div> 
                </div>            
        </div>
        <form name="form_carnet" method="get" action="index.php?">
            <input type="hidden" name="cuerpo" value="rejilla_pacientes.php"/>
            <input class="boton" type="submit" name="volver" value="Volver a Rejilla"/>
        </form>
    </body>    
</html>