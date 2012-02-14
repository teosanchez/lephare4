<?php
class rejilla_citas
    {
    private $_datos; //array de datos a mostrar
    private $_formDestino; //formulario de edicion de cada fila
    private $_campoClave; // Clave primaria de la tabla
    private $_campoEnlace; //Campo que hara de enlace al form de edicion
    public function __construct($datos, $formDestino,$campoClave,$campoEnlace)
        {
        $this->_datos=$datos;
        $this->_formDestino=$formDestino;
        $this->_campoClave=$campoClave;
        $this->_campoEnlace=$campoEnlace;
        }
    private function cabecera()
        {
        $salida='<table id=\"detalle\"><tr>';
        $datos=$this->_datos;
        foreach($datos[0] as $indice=>$valor)
            {
                if ($indice<>"id")      /* Incluir en generador */
                {                       /* Incluir en generador */
                    if($indice!="Visitado")
                    {
                    $salida.="<th>".$indice."</th>";        
                    }
                }                       /* Incluir en generador */
            }
        $salida.="<th>Visita</th>";   
        $salida.="</tr>";
        return $salida;
        }
    private function enlazar($indice,$valor,$valorClave)
        {
        if($indice==$this->_campoEnlace)
            {
            $salida= 
            '<a href="'.$this->_formDestino.$this->_campoClave."=".$valorClave.'">'.$valor ."</a>";
            }
        else
            {
            $salida=$valor;
            }
        return $salida;
        }
    public function pintar()
        {
        $datos=$this->_datos;

        $salida=$this->cabecera();

        $salida.="<tbody>";

        foreach($datos as $fila)
            {
            $salida.="<tr>";
                foreach($fila as $indice=>$valor)
                    {
                        if ($indice<>"id")      /* Incluir en generador */
                        {                       /* Incluir en generador */
                            $clave=$fila[$this->_campoClave];
                            if($indice!="Visitado")
                                {
                                $salida.="<td class=\"celda\">".$this->enlazar($indice,$valor,$clave)."</td>";
                                }
                        }                       /* Incluir en generador */
                    }    
                if(!$fila["Visitado"])
                    {
                    $salida.="<td><a href=\"index.php?cuerpo=form_visitas.php&id_cita=".
                            $fila['id']."\">visitar</a></td>";        
                    }
                else 
                    {
                    $salida.="<td class=\"visitado\">Visitado</td>";
                    }
             $salida.="</tr>";   
             }
        $salida.="</tbody></table>";
        return $salida;
        }
     }
?>