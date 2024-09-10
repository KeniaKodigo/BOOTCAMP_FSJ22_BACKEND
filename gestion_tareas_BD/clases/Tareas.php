<?php

require_once "./clases/Conexion.php";

class Tareas{
    //atributos para mi clase
    public $id;
    public $titulo;
    public $descripcion;
    public $fecha;
    public $estado;
    public $id_empleado;

    //metodo constructor (inicializar al objeto)
    public function __construct($titulo, $descripcion, $id_empleado)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = date('Y-m-d');
        $this->estado = "Pendiente";
        $this->id_empleado = $id_empleado;
    }

    //metodo que guarde la informacion a la bd
    public function guardar(){
        try{
            $conexion = Conexion::conectar();
            //generando la consulta de registro
            $query = $conexion->prepare("INSERT INTO tareas(titulo, descripcion, fecha_creacion, estado, id_empleado) VALUES (?, ?, ?, ?, ?)");

            //ejecutar la consulta y pasamos los valores (atributos de la clase)
            $result = $query->execute(["$this->titulo","$this->descripcion","$this->fecha","$this->estado", $this->id_empleado]);

            if($result){
                echo "Se ha guardado correctamente";
            }
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        
    }

    //metodo para obtener todas las tareas
    public static function getTareas(){
        $conexion = Conexion::conectar();

        //consulta sql donde unimos la tabla tareas y empleados
        $consulta = $conexion->query("select tareas.id_tarea, tareas.titulo, tareas.descripcion, tareas.fecha_creacion, tareas.estado, empleados.nombre as empleado from tareas inner join empleados on tareas.id_empleado = empleados.id_empleado");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC); //[]
        return $resultado;
    }

    //metodo para actualizar el estado de la tarea
    public static function actualizar_estado($id_tarea, $nuevo_estado){
        try{
            $conexion = Conexion::conectar();

            //consulta sql = UPDATE tareas 
            $consulta = $conexion->prepare("UPDATE tareas SET estado = ? WHERE id_tarea = ?");
            $resultado = $consulta->execute(["$nuevo_estado", $id_tarea]); //true / false

            if($resultado){
                echo "Se ha actualizado el estado de la tarea";
            }
        }catch(PDOException $e){
            echo "Error al actualizar el estado: " . $e->getMessage();
        }
    }
}



?>