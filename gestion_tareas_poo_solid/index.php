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

        // $empleado = new Empleados("A002","Andrea Chacon",65783423,"Asistente de Ventas");
        // $empleado->setCorreo("andrea@gmail.com");
        // $empleado->setSueldo(580);
        // $empleado->setPassword("andreronee123");
        // echo $empleado->agregarEmpleado();

        // $tarea = new Tareas(1,"Crear diagrama de clases","diagrama para la gestion de tareas","SB001");
        // echo $tarea->agregarTarea();
        Tareas::cambiarEstado(1, "Completada");
    ?>
</body>
</html>