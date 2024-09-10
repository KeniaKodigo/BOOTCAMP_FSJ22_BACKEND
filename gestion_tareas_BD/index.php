<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./clases/Conexion.php";
        require_once "./clases/Empleados.php";
        require_once "./clases/Tareas.php";

        //print_r(Conexion::conectar());
        //echo "<br>";
        //echo json_encode(Empleados::getEmpleados());
        //print_r(Empleados::getEmpleados());

        //crear una nueva tarea
        // $tarea = new Tareas("Testar la APP","hacer pruebas unitarias para la API", 2);

        // $tarea2 = new Tareas("Maquetar sitio web","utilizar figma para el diseno ui / ux", 2);
        // $tarea2->guardar();
        echo json_encode(Tareas::getTareas());
        //echo Tareas::actualizar_estado(2, "Completada");
    
    ?>
</body>
</html>