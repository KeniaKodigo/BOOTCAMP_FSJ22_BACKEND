<?php

class Conexion{

    //metodo para conectarme a la base de datos
    public static function conectar(){
        try{
            $conexion = 'mysql:host=localhost;dbname=gestion_tareas;charset=utf8';
            $usuario = 'root';
            $pdo = new PDO($conexion, $usuario, "");
            return $pdo;

        }catch(PDOException $e){
            echo "Error de conexion " . $e->getMessage();
            exit();
        }
    }
}


?>