<?php
//clase base
class Empleados{
    public $codigo_empleado;
    public $nombre;
    public $telefono;
    private $correo; //set y get
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

    //metodo para agregar empleados a un arreglo
    public function agregarEmpleado(){
        //antes de agregar un nuevo empleado, cargamos la lista del json decodificado y la actualizamos
        $array_empleados = self::cargarListaEmpleados();
        //agregamos un nuevo empleado al arreglo
        //arreglo asociativo
        $array_empleados[] = [
            'codigo_empleado' => $this->codigo_empleado,
            'nombre' => $this->nombre,
            'telefono' => $this->telefono, 
            'correo' => $this->getCorreo(),
            'cargo' => $this->cargo,
            'sueldo' => $this->getSueldo(),
            'password' => $this->getPassword()
        ];
        //guardamos la informacion en el json ya codificado
        self::guardarEmpleadoJSON($array_empleados);
        return "Se ha guardado correctamente";
    }

    //metodo para cargar la lista de empleados
    public static function cargarListaEmpleados(){
        //retornar el json de los empleados para que se vaya actualizado al momento de agregar un nuevo empleado

        //validamos si el archivo existe
        if(file_exists('empleados.json')){
            //obtenemos la informacion del archivo
            $informacion_json = file_get_contents('empleados.json');
            //decodificamos la informacion del json
            return json_decode($informacion_json, true); //[]
        }
        return [];
    }

    //uso exclusivo para la clase (metodo agregarEmpleados)
    private static function guardarEmpleadoJSON($lista_empleado){
        //codificamos la lista a un json
        $json_codificado = json_encode($lista_empleado, JSON_PRETTY_PRINT);
        //agregamos nuevo contenido al json
        file_put_contents('empleados.json', $json_codificado);
    }
}

?>