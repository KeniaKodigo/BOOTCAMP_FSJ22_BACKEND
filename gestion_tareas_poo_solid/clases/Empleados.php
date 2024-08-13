<?php

class Empleados{
    public $codigo_empleado;
    public $nombre;
    public $telefono;
    private $correo;
    public $cargo;
    private $sueldo;
    private $password;

    public function __construct($codigo, $nombre, $telefono, $cargo){
        $this->codigo_empleado = $codigo;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->cargo = $cargo;
    }
    
    //metodo set y get para atributos privados
    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }
}

?>