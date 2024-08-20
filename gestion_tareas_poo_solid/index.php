<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <!-- incluimos el nav -->
    <?php include("./assets/nav.php"); ?>
    <main class="container">
        <h1 class="text-center text-primary my-4">Gestion de Empleados</h1>

    <!-- Carga de datos de los empleados -->
    <?php
        /** Hacemos el llamado del metodo para cargar la informacion del json de los empleados */
        require_once("./clases/Gerente.php");
        $lista_empleados = Gerente::cargarListaEmpleados(); //[]

    ?>
    <a href="./registrar_empleado.php" class="btn btn-success my-4">Agregar Empleado</a>
    <table class="table">
        <thead>
            <th>Codigo</th>
            <th>Empleado</th>
            <th>Correo Electronico</th>
            <th>Cargo</th>
        </thead>
        <tbody>
            <?php 
                #Iteramos la informacion del arreglo de empleados 
                foreach($lista_empleados as $empleado){
            ?>
                <tr>
                    <!-- Accedemos a los campos del json de los empleados -->
                    <td><?php echo $empleado['codigo_empleado'];  ?></td>
                    <td><?php echo $empleado['nombre'];  ?></td>
                    <td><?php echo $empleado['correo'];  ?></td>
                    <td><?php echo $empleado['cargo'];  ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>