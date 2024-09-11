<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./clases/Conexion.php";
        require_once "./clases/Empleados.php";
        require_once "./clases/Tareas.php";

        $tareas = Tareas::getTareas(); //me devuelve un arreglo con los datos
        //print_r($tareas)
        $empleados = Empleados::getEmpleados(); //[]
    ?>
    <main class="container">
        <h1 class="text-center my-4">Gestion de Tareas</h1>
        <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar Tarea</button>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha Creacion</th>
                <th>Estado</th>
                <th>Empleado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach($tareas as $tarea){ 
                    $clase_estado = "";
                    $disabled = "";
                    switch($tarea["estado"]){
                        case "Pendiente":
                            $clase_estado = 'text-warning bg-light fw-bold';
                            break;
                        case "En Proceso":
                            $clase_estado = 'text-primary bg-light fw-bold';
                            break;
                        case "Completada":
                            $clase_estado = 'text-success bg-light fw-bold';
                            $disabled = "disabled";
                            break;
                    }
                ?>
                    <tr>
                        <td><?php echo $tarea["id_tarea"]; ?></td>
                        <td><?php echo $tarea["titulo"]; ?></td>
                        <td><?php echo $tarea["fecha_creacion"]; ?></td>
                        <td class="<?php echo $clase_estado ?>"><?php echo $tarea["estado"]; ?></td>
                        <td><?php echo $tarea["empleado"]; ?></td>
                        <td>
                            <button <?php echo $disabled; ?> type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalEstado<?php echo $tarea['id_tarea']; ?>">Cambiar Estado</button>
                        </td>
                    </tr>

                <!-- Modals que se utilizan para el cambio de estado de la tarea -->
                <div class="modal fade" id="ModalEstado<?php echo $tarea['id_tarea']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizacion de Estado Tarea</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <h5 class="text-info"><?php echo $tarea["titulo"]; ?></h5>

                            <!-- capturando el id de la tarea seleccionada -->
                            <input type="hidden" name="id_tarea" value="<?php echo $tarea["id_tarea"]; ?>">

                            <label for="">Actualizar Estado</label>
                            <select name="estado" id="" class="form-control">
                                <option value="Pendiente">Pendiente</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Completada">Completada</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                <?php } ?>
            </tbody>

        </table>

        <!-- Modal Para el registro de tareas -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Tareas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <label for="">Titulo</label>
                    <input type="text" name="titulo" class="form-control">

                    <label for="">Descripcion</label>
                    <textarea name="descripcion" id="" class="form-control"></textarea>

                    <label for="">Asignar Empleado</label>
                    <select name="empleado" id="" class="form-control">
                        <?php foreach($empleados as $item){ ?>
                            <option value="<?php echo $item['id_empleado']; ?>"><?php echo $item['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Guardar Tarea</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- Llamando al metodo para cambiar el estado de la tarea -->
        <?php 

            //declarar y llamar los datos del formulario
            if(isset($_POST['id_tarea'], $_POST['estado'])){
                $id = $_POST['id_tarea'];
                $estado = $_POST['estado'];

                //llamando a la funcion
                Tareas::actualizar_estado($id, $estado);
            }
        ?>
    </main>
    <?php 
        //Guardando la informacion de la tarea

        //capturamos los datos del formulario con $_POST[]
        if(isset($_POST['titulo'], $_POST['descripcion'], $_POST['empleado'])){
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $id_empleado = $_POST['empleado'];

            //instanciamos la clase tareas (para crear una nueva)
            $nueva_tarea = new Tareas($titulo, $descripcion, $id_empleado);
            $nueva_tarea->guardar();
        }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>