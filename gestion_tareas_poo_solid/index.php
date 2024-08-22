<?php 
    //inicializamos la sesion para guardar los datos
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio de Sesion</title>
</head>
<body>
    <main class="container">
        <h1 class="text-center text-info my-5">Inicio de Sesion</h1>
        <section class="d-flex justify-content-center">
            <form action="" method="post">
                <label for=""><strong>Correo Electronico:</strong></label>
                <input type="text" name="correo" class="form-control">

                <label for=""><strong>Contraseña:</strong></label>
                <input type="text" name="password" class="form-control">

                <input type="submit" class="mt-4 btn btn-success" value="Iniciar Sesion">
            </form>

            <?php 
                require_once "./clases/Autenticacion.php";

                if(isset($_POST['correo'], $_POST['password'])){
                    $correo = $_POST['correo'];
                    $password = $_POST['password'];

                    Autenticar::autenticar($correo, $password);
                }
            
            ?>
        </section>
    </main>
</body>
</html>