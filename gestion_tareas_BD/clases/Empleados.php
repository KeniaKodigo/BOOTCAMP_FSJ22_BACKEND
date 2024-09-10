<?php

require_once "./clases/Conexion.php";

class Empleados{

    //metodo donde consultamos la informacion de todos los empleados de la bd
    public static function getEmpleados(){
        $pdo = Conexion::conectar(); //la instancia de PDO para conectarnos a la bd

        //generar una consulta sql
        $query = $pdo->query("SELECT * FROM empleados"); //creo la consulta
        $query->execute(); //ejecutamos la consulta
        
        //al momento de ejecutar la consulta lo mandamos en un arreglo
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //[]
        return $result;
    }
}

// $empleado = new Empleados();
// $empleado->getEmpleados();

?>