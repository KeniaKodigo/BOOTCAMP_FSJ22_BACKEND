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
        //return "Se ha guardado la tarea correctamente";
        //recargadno la pagina de lista_tareas para visualizar la nueva tarea en la tabla
        echo "<script>
            window.location.href = 'lista_tareas.php'
        </script>";
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
            echo "<script>
                window.location.href = 'lista_tareas.php'
            </script>";
            //echo "Tarea actualizada";
        }else{
            echo "Tarea con el ID $id no fue encontrada";
        }
    }

    //Metodo para rescatar tareas por empleado
    public static function tareasByEmpleado($id_empleado){
        //iterar el arreglo de las tareas
        $lista_tareas = self::cargarTareas(); //[]
        //declaramos un arreglo que va manejar solo tareas de un empleado especifico
        $tareas_empleado = [];

        foreach($lista_tareas as $tarea){
            //comparamos el id del empleado con el parametro del usuario
            if($tarea['codigo_empleado'] == $id_empleado){
                $tareas_empleado[] = [
                    'id_tarea' => $tarea['id_tarea'],
                    'titulo' => $tarea['titulo'],
                    'descripcion' => $tarea['descripcion'], 
                    'fecha_creacion' => $tarea['fecha_creacion'],
                    'estado' => $tarea['estado'],
                    'codigo_empleado' => $tarea['codigo_empleado']
                ];
            }
        }
        //retornamos el arreglo con la informacion de las tareas por empleado
        return $tareas_empleado;
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