<?php

#clase Base abstracta
abstract class Trabajador{
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

    //la clase abstracta como minimo debe tener un metodo abstracto
    abstract function calcularBono(); //indicamos que la clase hija va estar obligada a darle comportamiento a este metodo

    abstract function obtenerInfo();
}

?>