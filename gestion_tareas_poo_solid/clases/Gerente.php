<?php
require_once "./Empleados.php";

class Gerente extends Empleados{

    //metodo para agregar empleados a un arreglo
    public function agregarEmpleado(){
        //antes de agregar un nuevo empleado, cargamos la lista del json decodificado y la actualizamos
        $array_empleados = $this->cargarListaEmpleados();
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
        $this->guardarEmpleadoJSON($array_empleados);
    }

    //metodo para cargar la lista de empleados
    public function cargarListaEmpleados(){
        //retornar el json de los empleados para que se vaya actualizado al momento de agregar un nuevo empleado

        //validamos si el archivo existe
        if(file_exists('empleados.json')){
            $informacion_json = file_get_contents('empleados.json');
            //decodificamos la informacion del json
            return json_decode($informacion_json, true);
        }
        return [];
    }

    private function guardarEmpleadoJSON($lista_empleado){
        //codificamos la lista a un json
        $json_codificado = json_encode($lista_empleado, JSON_PRETTY_PRINT);
        //agregamos nuevo contenido al json
        file_put_contents('empleados.json', $json_codificado);
    }
}

?>