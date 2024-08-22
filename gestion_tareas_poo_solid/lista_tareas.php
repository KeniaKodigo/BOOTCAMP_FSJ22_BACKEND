<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Home</title>
</head>
<body>
    <!-- incluimos el nav -->
    <?php include("./assets/nav.php"); ?>
    <main class="container">
        <h1 class="text-center text-primary my-4">Gestion de Tareas</h1>

    <!-- Carga de datos de los empleados -->
    <?php
        /** Hacemos el llamado del metodo para cargar la informacion del json de los empleados */
        require_once("./clases/Gerente.php");
        require_once("./clases/Tareas.php");

        $lista_tareas = Gerente::verTareas(); //[]
        //llamar el metodo para enlistar la informacion de los empleados
        $lista_empleados = Gerente::cargarListaEmpleados(); //[]

    ?>
    <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#ModalRegistroTarea">Registrar Tarea</button>

    <table class="table">
        <thead>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Fecha Creacion</th>
            <th>Estado</th>
            <th>Codigo Empleado</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php 
                #Iteramos la informacion del arreglo de tareas 
                foreach($lista_tareas as $tarea){
                    $clase_estado = "";
                    switch($tarea['estado']){
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
                    <!-- Accedemos a los campos del json de las tareas -->
                    <td><?php echo $tarea['id_tarea'];  ?></td>
                    <td><?php echo $tarea['titulo'];  ?></td>
                    <td><?php echo $tarea['fecha_creacion'];  ?></td>
                    <td class="<?php echo $clase_estado ?>"><?php echo $tarea['estado'];  ?></td>
                    <td><?php echo $tarea['codigo_empleado'];  ?></td>
                    <td>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalEstado<?php echo $tarea['id_tarea'];  ?>">Cambiar Estado</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="ModalEstado<?php echo $tarea['id_tarea'];  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizacion de estado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <!-- accediendo a los campos de la lista de tareas del json -->
                            <h6 class="text-center"><?php echo $tarea['titulo'];  ?></h6>
                            <p class="text-center"><strong>Estado: </strong><?php echo $tarea['estado'];  ?></p>

                            <input type="hidden" name="id" value="<?php echo $tarea['id_tarea'];  ?>">

                            <label for="">Actualizar Estado</label>
                            <select name="estado" id="" class="form-control">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Completada">Completada</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Actualizar Estado</button>
                            
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                <!-- cierre del modal de actualizar estado -->
                <?php
                    if(isset($_POST['id'], $_POST['estado'])){
                        $id_tarea = $_POST['id']; //extraemos el valor del input oculto
                        $estado = $_POST['estado'];
                        //echo $estado;
                        //metodo para cambiar el estado
                        Tareas::cambiarEstado($id_tarea, $estado);
                    }
                ?>
            <?php } ?>
        </tbody>
    </table>

    <!-- Modal para registrar tareas -->
    <div class="modal fade" id="ModalRegistroTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Tareas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
            <div class="modal-body">
                <label for="">Id Tarea</label>
                <input type="text" name="id_tarea" class="form-control">

                <label for="">Titulo</label>
                <input type="text" name="titulo" class="form-control">

                <label for="">Descripcion</label>
                <input type="text" name="descripcion" class="form-control">

                <label for="">Asignar Empleado</label>
                <!-- generar un select de la lista de empleados -->
                <select name="id_empleado" id="" class="form-control">
                    <?php foreach($lista_empleados as $empleado){ ?>
                        <option value="<?php echo $empleado['codigo_empleado']; ?>"><?php echo $empleado['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Cierre del modal -->
    <?php 
        //validamos y guardamos la informacion de la tarea
        if(isset($_POST['id_tarea'], $_POST['titulo'], $_POST['descripcion'], $_POST['id_empleado'])){

            $id_tarea = $_POST['id_tarea'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id_empleado = $_POST['id_empleado'];

            Gerente::crearTarea($id_tarea, $titulo, $descripcion, $id_empleado);
        }
    ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>