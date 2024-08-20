<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        require_once "./clases/Empleados.php";
        require_once "./clases/Tareas.php";
        require_once "./clases/Gerente.php";

        // $empleado = new Empleados("NM005","Nelson Chacon",76451237,"Vendedor");
        // $empleado->setCorreo("nelson@gmail.com");
        // $empleado->setSueldo(450);
        // $empleado->setPassword("nelson123");
        // echo $empleado->agregarEmpleado();

        // $tarea = new Tareas(1,"Crear diagrama de clases","diagrama para la gestion de tareas","SB001");
        // echo $tarea->agregarTarea();
        //Tareas::cambiarEstado(1, "Completada");

        //llamado de la lista de empleados en el json
        // $empleado = new Empleados("A002","Andrea Chacon",65783423,"Asistente de Ventas");
        // print_r($empleado->cargarListaEmpleados());

        //echo json_encode(Tareas::cargarTareas());
        
        //Empleados::class;

        //El gerente agrega una tarea
        // $tarea = Gerente::crearTarea(3,"prueba 500","status http","NM005");
        // echo $tarea;

        // echo json_encode(Gerente::verTareas());
        // echo json_encode(Gerente::cargarListaEmpleados());
    ?>
</body>
</html>