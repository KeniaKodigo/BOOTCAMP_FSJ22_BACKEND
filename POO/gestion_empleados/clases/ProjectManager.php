<?php
require_once "./Trabajador.php";

class ProjectManager extends Trabajador{
    protected $experiencia;
    protected $area_especializada;

    public function __construct($nombre, $edad, $area, $experiencia)
    {
        //heredando el constructor padre (super)
        parent::__construct($nombre, $edad);
        $this->area_especializada = $area;
        $this->experiencia = $experiencia;
    }

    public function calcularBono()
    {
        //obtenemos el salario del empleado y hacemos el calculo
        return $this->getSalario() * 0.25;
    }

    public function obtenerInfo()
    {
        echo "Empleado: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Area Especializada: " . $this->area_especializada . "<br>";
        echo "Años de experiencia: " . $this->experiencia . "<br>";
        echo "Salario: $" . $this->getSalario() . "<br>";
        echo "Bono: $" . $this->calcularBono() . "<br>";
    }
}

$projectmanager1 = new ProjectManager("Maria Chacon",35,"Area de Desarrollo de Software",6);
$projectmanager1->setSalario(935);
$projectmanager1->obtenerInfo();

?>