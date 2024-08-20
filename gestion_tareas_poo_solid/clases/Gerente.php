<?php
require_once "./clases/Empleados.php";

class Gerente extends Empleados{

    public static function crearTarea($id, $titulo, $descripcion, $codigo_empleado){
        //el gerente instancia la clase Tareas para crear una nueva
        $tarea = new Tareas($id, $titulo, $descripcion, $codigo_empleado);
        $results = $tarea->agregarTarea();
        return $results; //mensaje
    }

    //ver la lista de las tareas
    public static function verTareas(){
        return Tareas::cargarTareas();
    }
}



?>