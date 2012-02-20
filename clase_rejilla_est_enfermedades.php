<?php
class rejilla_est_enfermedades

{

  
    private $_datos; //array de datos a mostrar
    
    public function __construct($datos)
        {
        $this->_datos=$datos;
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
                            $salida.="<td>".$valor."</td>";
                        }                           /* Incluir en generador */
                }
        $salida.="</tr>";
            }
        $salida.="</tbody></table>";
        return $salida;
        }


        
     public function pintar2()
        {
        $datos=$this->_datos;

        $salida=$this->cabecera();

        $salida.="<tbody>";

        foreach($datos as $fila)
            {
            $salida.="<tr>";
            foreach($fila as $indice=>$valor)
                {
                    if ($indice<>"Enfermedad" and $indice<>"Sexo") /* Incluir en generador */
                    {                           /* Incluir en generador */
                        $salida.="<td>".number_format($valor,2)."%</td>";
                    }  
                     else 
                    {
                         $salida.="<td>".$valor."</td>";
                    }/* Incluir en generador */
                }
        $salida.="</tr>";
            }
        $salida.="</tbody></table>";
        return $salida;
        }
       


        
private function cabecera2()
        {
        $salida='<table id=\"detalle\"><tr>';
        $datos=$this->_datos;

       foreach($datos as $indice=>$valor)
        {    
            if ($indice<>"id")          /* Incluir en generador */
            {                           /* Incluir en generador */
		$salida.="<th>".$indice."</th>";
            }                           /* Incluir en generador */
        } 
        $salida.="</tr>";
        return $salida;

        }

        
    public function pintar2()
        {
        $datos=$this->_datos;

        $salida=$this->cabecera2();

        $salida.="<tbody>";
        $salida.="<tr>";

        foreach($datos as $indice=>$valor)
            {
               $salida.="<td>";
                if ($indice<>"id")              /* Incluir en generador */
                    {                           /* Incluir en generador */
                        $salida.=$valor;
                    }                           /* Incluir en generador */
                $salida.="</td>";

            }
        $salida.="</tr>";
        $salida.="</tbody></table>";
        return $salida;
        }
    }

?>