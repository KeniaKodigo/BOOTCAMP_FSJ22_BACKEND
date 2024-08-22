<?php 
require_once "./clases/Empleados.php";

class Autenticar{

    public static function autenticar($correo, $password){
        $lista_empleados = Empleados::cargarListaEmpleados(); //[]

        //iteramos la informacion del json de los empleados
        foreach($lista_empleados as $empleado){
            //verificamos si el empleado existe
            if($empleado['correo'] == $correo && $empleado['password'] == $password){
                //Crear sesiones para almacenar ciertos datos de la persona que ingreso
                $_SESSION['id_empleado'] = $empleado['codigo_empleado'];
                $_SESSION['empleado'] = $empleado['nombre'];
                $_SESSION['cargo'] = $empleado['cargo'];

                //validamos si la persona es gerente o no
                if($empleado['cargo'] == "Gerente"){
                    //redireccion a la vista home_gerente
                    header("location: home_gerente.php");
                }else{
                    header("location: home_empleado.php");
                }
            }
        }
        echo "<div class='alert alert-danger mt-5' role='alert'>
            Credenciales Invalidas
        </div>";

    }
}


?>