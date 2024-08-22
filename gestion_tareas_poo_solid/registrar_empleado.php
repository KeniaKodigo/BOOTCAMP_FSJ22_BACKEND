<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro de Empleados</title>
</head>
<body>
    <?php include("./assets/nav.php"); ?>
    <main class="container">
        <h1 class="text-center text-primary my-4">Registro de Empleados</h1>
        <form action="" method="post">
            <label for="">Codigo del Empleado</label>
            <input type="text" name="codigo" class="form-control">

            <label for="">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control">

            <label for="">Telefono</label>
            <input type="text" name="telefono" class="form-control">

            <label for="">Correo Electronico</label>
            <input type="text" name="correo" class="form-control">

            <label for="">Cargo</label>
            <input type="text" name="cargo" class="form-control">

            <label for="">Sueldo</label>
            <input type="text" name="sueldo" class="form-control">

            <label for="">Contraseña</label>
            <input type="text" name="password" class="form-control">

            <input type="submit" class="btn btn-dark mt-4" value="Guardar Datos">
        </form>
    </main>
    <?php 
        require_once "./clases/Empleados.php";

        if(isset($_POST['codigo'], $_POST['nombre'], $_POST['telefono'], $_POST['correo'], $_POST['cargo'], $_POST['sueldo'], $_POST['password'])){
            //Palabras Magicas
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $cargo = $_POST['cargo'];
            $sueldo = $_POST['sueldo'];
            $password = $_POST['password'];

            //agregar un nuevo empleado
            $empleado = new Empleados($codigo, $nombre, $telefono, $cargo);
            $empleado->setCorreo($correo);
            $empleado->setSueldo($sueldo);
            $empleado->setPassword($password);

            $resultado = $empleado->agregarEmpleado();
            echo "<div class='alert alert-primary' role='alert'>$resultado</div>";
        }
        
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>