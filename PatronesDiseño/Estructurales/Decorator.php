<?php

class Reportes {
    public function generar() {
        return "Contenido del reporte";
    }
}

//decoracion
class ReporteConCabecera {
    public function generar() {
        return "Cabecera\n" . "Contenido del reporte";
    }
}

class ReporteConPieDePagina {
    public function generar() {
        return "Contenido del reporte\n" . "Pie de página";
    }
}

//No existe una relacion como tal con las clases
$reporte = new Reportes();
echo $reporte->generar();

// Si quiero agregar cabecera y pie de página, tendría que crear nuevas clases o métodos
$reporteConCabecera = new ReporteConCabecera();
echo $reporteConCabecera->generar();

$reporteConPieDePagina = new ReporteConPieDePagina();
echo $reporteConPieDePagina->generar();



#Aplicando el patron decorator 
//intermediario para conectarnos al reporte y sus decoraciones
interface Reporte{
    public function generar();
}

#clasificamos tipos de reportes (reporte basico, reporte financiero)
class ReporteBasico implements Reporte{
    public function generar(){
        return "Reporte de ventas anuales";
    }
}

#clase base decorador
abstract class ReporteDecorator implements Reporte{
    protected $reporte;

    //Recibimos a quien vamos a decorar
    public function __construct(Reporte $reporte) //new ReporteBasico
    {
        $this->reporte = $reporte;
    }
}
#decoraciones

?>