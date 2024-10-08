<?php
require_once "./clases/Empleados.php";
require_once "./clases/Tareas.php";

class Gerente extends Empleados{

    public static function crearTarea($id, $titulo, $descripcion, $codigo_empleado){
        //el gerente instancia la clase Tareas para crear una nueva
        $tarea = new Tareas($id, $titulo, $descripcion, $codigo_empleado);
        return $tarea->agregarTarea();
        //return $results; //mensaje
        //redireccionamos a una vista
        //header("location: ./index.php");
        
    }

    //ver la lista de las tareas
    public static function verTareas(){
        return Tareas::cargarTareas();
    }
}

// Gerente::crearTarea();
// Gerente::crearTarea();

// $objeto1 = new Gerente();
// $objeto1->crearTarea();

// $objeto2 = new Gerente();
// $objeto2->crearTarea();

// $objeto3 = new Gerente();
// $objeto3->crearTarea();


?>