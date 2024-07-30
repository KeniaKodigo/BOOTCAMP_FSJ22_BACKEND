<?php
//llamamos al archivo verificando que solo llame una vez
require_once "./Trabajador.php";

#clase derivada
class Desarrollador extends Trabajador{
    protected $especialidad;
    protected $experiencia;
    protected $lenguaje_programacion;

    //modificamos el constructor
    public function __construct($nombre, $edad, $especialidad, $experiencia, $lenguaje)
    {
        //heredando el constructor padre (super)
        parent::__construct($nombre, $edad);
        $this->especialidad = $especialidad;
        $this->experiencia = $experiencia;
        $this->lenguaje_programacion = $lenguaje;
    }

    //metodos
    public function calcularBono()
    {
        //obtenemos el salario del empleado y hacemos el calculo
        return $this->getSalario() * 0.15;
    }

    public function obtenerInfo()
    {
        echo "Empleado: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br>";
        echo "Años de experiencia: " . $this->experiencia . "<br>";
        echo "Lenguaje Favorito: " . $this->lenguaje_programacion . "<br>";
        echo "Salario: $" . $this->getSalario() . "<br>";
        echo "Bono: $" . $this->calcularBono() . "<br>";
    }
}

$desarrollador1 = new Desarrollador("Juan Perez",26,"Programador FrontEnd",3,"JavaScript");
$desarrollador1->setSalario(680);
$desarrollador1->obtenerInfo();


?>