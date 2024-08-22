<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Home Empleado</title>
</head>
<body>
    <?php 
        include("./assets/nav.php"); 
        require_once "./clases/Tareas.php";
        $id_empleado = $_SESSION['id_empleado'];
        $arreglo = Tareas::tareasByEmpleado($id_empleado); //[]
    ?>
    <main class="container">
        <h1 class="text-center text-info my-4">Bienvenido/a <?php echo $_SESSION['empleado']; ?></h1>

        <h5 class="text-success">Tareas Asignadas:</h5>
        <table class="table">
            <thead>
                <th>ID Tarea</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Estado</th>
            </thead>
            <tbody>
                <?php
                    //validamos si el arreglo contiene tareas o no
                    if(count($arreglo) >= 1){
                        foreach($arreglo as $item){ 
                            $clase_estado = "";
                            switch($item['estado']){
                                case "Pendiente":
                                    $clase_estado = 'pendiente'; 
                                    break;
                                case "En Proceso":
                                    $clase_estado = 'proceso';
                                    break;
                                case "Completada":
                                    $clase_estado = 'completado';
                                    break;
                            }
                ?>
                            <tr>
                                <td><?php echo $item['id_tarea']; ?></td>
                                <td><?php echo $item['titulo']; ?></td>
                                <td><?php echo $item['descripcion']; ?></td>
                                <td class="<?php echo $clase_estado ?>"><?php echo $item['estado']; ?></td>
                            </tr>
                <?php
                        }
                    }else{
                ?>
                    <tr>
                        <td class="text-danger fw-bold text-center" colspan="4">No hay tareas asignadas</td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </main>
</body>
</html>