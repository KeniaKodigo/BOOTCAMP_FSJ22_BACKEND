<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <h1>Gestion de Empleados</h1>
        <form action="" method="POST">
            <label for="">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control">

            <label for="">Edad</label>
            <input type="number" name="edad" class="form-control">

            <label for="">Salario</label>
            <input type="text" name="salario" class="form-control">

            <label for="">Selecciona tu cargo</label>
            <select name="cargo" id="" class="form-control">
                <option value="Desarrollador">Desarrollador</option>
                <option value="Project Manager">Project Manager</option>
                <option value="Otro">Otro..</option>
            </select>
            
            <input type="submit" value="Enviar Datos" class="btn btn-dark mt-4">
        </form>

        <!-- recopilacion de datos -->
        <?php 
            require "./Empleados.php";
            //Obtenemos los datos del formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $salario = $_POST['salario'];
                $tipo_empleado = $_POST['cargo'];

                //hacemos la instancia (llamado) de la clase
                $empleado1 = new Empleados($nombre, $edad);
                $empleado1->setSalario($salario);
                $calcular_bono = $empleado1->calcularBono($tipo_empleado);
                //imprimir datos
                $empleado1->getEmpleado();
                echo "Bono: $" . $calcular_bono;
            }
            
        ?>
    </main>
</body>
</html>