<?php 
//Abstraccion y encapsulamiento
class Empleados{
    public $nombre;
    public $edad;
    private $salario;

    #inicializando el objeto del empleado
    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    #get y set
    //capturamos el salario del empleado
    public function setSalario($salario){
        $this->salario = $salario;
    }

    //retornamos el sueldo
    public function getSalario(){
        return $this->salario;
    }

    //metodo para calcular el bono del empleado
    public function calcularBono($tipo_empleado){
        $bono = 0;
        //salario
        //porcentaje desarrollador 15%, project manager 25%
        //estructura de control condicionante
        switch($tipo_empleado){
            case "Desarrollador":
                $bono = $this->salario * 0.15;
                break;
            case "Project Manager":
                $bono = $this->salario * 0.25;
                break;
            default:
                $bono = 0;
        }
        return $bono;
    }

    //metodo para obtener los datos
    public function getEmpleado(){
        echo "Empleado: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Salario: $" . $this->getSalario() . "<br>";
    }
}

// $empleado = new Empleados("Juan Perez", 30);
// $empleado->setSalario(750);
// $bono = $empleado->calcularBono("Desarrollador");
// $empleado->getEmpleado();
// echo "Bono: " . $bono;


?>