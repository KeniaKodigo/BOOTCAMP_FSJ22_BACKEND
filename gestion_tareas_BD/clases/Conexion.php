<?php

class Conexion{

    //metodo para conectarme a la base de datos
    public static function conectar(){
        try{
            $conexion = 'mysql:host=localhost;dbname=gestion_tareas;charset=utf8';
            $usuario = 'root';
            //informacion de la bd, usuario y password
            $pdo = new PDO($conexion, $usuario, "");
            return $pdo; //objeto

        }catch(PDOException $e){
            echo "Error de conexion " . $e->getMessage();
            exit();
        }
    }
}


?>