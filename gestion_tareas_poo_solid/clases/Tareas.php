<?php

class Tareas{
    public $id_tarea;
    public $titulo;
    protected $descripcion;
    protected $fecha_creacion;
    public $estado;
    public $codigo_empleado;

    public function __construct($id, $titulo, $descripcion, $codigo_empleado)
    {
        $this->id_tarea = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha_creacion = date('Y-m-d'); //capturamos la fecha actual
        $this->estado = 'Pendiente';
        $this->codigo_empleado = $codigo_empleado;
    }

    public function agregarTarea(){
        /**
         * el self hace referencia al nombre de su clase "Tareas" por ser un metodo estatico se utiliza la palabra reservada "self" en vez de $this
         */
        $array_tareas = self::cargarTareas();
        //agregamos un nuevo empleado al arreglo
        //arreglo asociativo
        $array_tareas[] = [
            'id_tarea' => $this->id_tarea,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion, 
            'fecha_creacion' => $this->fecha_creacion,
            'estado' => $this->estado,
            'codigo_empleado' => $this->codigo_empleado
        ];
        //guardamos la informacion en el json ya codificado
        self::guardarTarea($array_tareas);
        return "Se ha guardado la tarea correctamente";
    }

    //metodos estaticos
    public static function cargarTareas(){
        //cargar un json
        if(file_exists('tareas.json')){
            $informacion_json = file_get_contents('tareas.json');
            //decodificamos la informacion del json
            return json_decode($informacion_json, true); //[]
        }
        return [];
    }

    private static function guardarTarea($tarea){
        //actualizar un json
        //codificamos la lista a un json
        $json_codificado = json_encode($tarea, JSON_PRETTY_PRINT);
        //agregamos nuevo contenido al json
        file_put_contents('tareas.json', $json_codificado);
    }

    //metodo para cambiar el estado de la tarea
    public static function cambiarEstado($id, $nuevo_estado){
        //obtenemos el arreglo de las tareas
        $tareas = self::cargarTareas(); //[]
        $tarea_encontrada = false;
        //iteramos el arreglo para verificar la tarea por su id
        //& => hace una referencia a la informacion de las tareas del arreglo
        foreach($tareas as &$tarea){
            if($tarea['id_tarea'] == $id){
                //echo "Tarea encontrada";
                //cambiamos el estado de la tarea
                $tarea['estado'] = $nuevo_estado;
                $tarea_encontrada = true;
                // echo $tarea['titulo'] . "<br>";
                // echo $tarea['estado'];
            }
        }

        //si la tarea existe actualizamos el json
        if($tarea_encontrada){
            //actualizamos el json
            self::guardarTarea($tareas);
            echo "Tarea actualizada";
        }else{
            echo "Tarea con el ID $id no fue encontrada";
        }
    }
}

/**
 * metodo estaticos
 * no son metodos de instancia
 */

#crear una instancia
// $tarea = new Tareas();
// $tarea->agregarTarea();

// //metodo estatico
// Tareas::cargarTareas();



?>