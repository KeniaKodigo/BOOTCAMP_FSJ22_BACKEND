<?php

use LDAP\Result;

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
// $reporte = new Reportes();
// echo $reporte->generar();

// Si quiero agregar cabecera y pie de página, tendría que crear nuevas clases o métodos
// $reporteConCabecera = new ReporteConCabecera();
// echo $reporteConCabecera->generar();

// $reporteConPieDePagina = new ReporteConPieDePagina();
// echo $reporteConPieDePagina->generar();

#Aplicando el patron decorator 
//intermediario para conectarnos al reporte y sus decoraciones
interface ReporteInterface{
    public function generar();
}

//Producto en concreto 
#clasificamos tipos de reportes (reporte basico, reporte financiero)
class ReporteBasico implements ReporteInterface{
    public function generar(){
        return "Reporte de ventas anuales";
    }
}

#clase base decorador
abstract class ReporteDecorator implements ReporteInterface{
    protected $reporte; //va tener acceso a lo que tenga la interfaz

    //Recibimos a quien vamos a decorar
    //el constructor va inicializar el objeto con objetos que sea de tipo "ReporteInterface" es decir las clases que implementen a la interfaz
    public function __construct(ReporteInterface $reporteInterface) //new ReporteBasico
    {
        $this->reporte = $reporteInterface;
    }
}

#decoraciones
class EncabezadoDecorator extends ReporteDecorator{
    //implementamos el metodo de la interfaz
    public function generar()
    {
        return "Cabecera del reporte <br>" . $this->reporte->generar();
    }
}

class PiePaginaDecorator extends ReporteDecorator{
    //implementamos el metodo de la interfaz
    public function generar()
    {
        return $this->reporte->generar() . "<br>Pie de Pagina";
    }
}

//Uso del decorator
//creamos el reporte basico
echo "<h2>Uso de reporte sin decorador</h2>";
$reporte = new ReporteBasico();
echo $reporte->generar();
echo "<br>";

echo "<h2>Uso de reporte con decoradores</h2>";
$reporte2 = new ReporteBasico();
//aplicamos decoraciones, asignamos a quien vamos a decorar
$reporte_encabezado = new EncabezadoDecorator($reporte2);
echo $reporte_encabezado->generar();
//Agregamos otra decoracion como el pie de pagina al reporte
$reporte_pie_pagina = new PiePaginaDecorator($reporte_encabezado);
echo $reporte_pie_pagina->generar();



?>