<?php
class rejilla
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
            if ($indice<>"id")          /* Incluir en generador */
            {                           /* Incluir en generador */
		$salida.="<th>".$indice."</th>";
            }                           /* Incluir en generador */
        }
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
                    if ($indice<>"id")              /* Incluir en generador */
                        {                           /* Incluir en generador */
                            $clave=$fila[$this->_campoClave];
                            $salida.="<td>".$this->enlazar($indice,$valor,$clave)."</td>";
                        }                           /* Incluir en generador */
                }
        $salida.="</tr>";
            }
        $salida.="</tbody></table>";
        return $salida;
        }
    }
?>
