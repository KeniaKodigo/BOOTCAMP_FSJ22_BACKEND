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
        //incluimos el nav
        include("./assets/nav.php"); 
    ?>
    <main class="container">
        <h1>Registro de Aerolineas</h1>

        <!-- 
            GET, POST, PUT, DELETE
        -->
        <form action="" method="POST">
            <label for="">Aerolinea</label>
            <input type="text" name="nombre" class="form-control">

            <label for="">Identificador</label>
            <input type="text" name="identificador" class="form-control">

            <label for="">Numero Aviones</label>
            <input type="text" name="numero_aviones" class="form-control">

            <label for="">Tipo de Aerolinea</label>
            <select name="tipo" id="" class="form-control">
                <option value="Comerciales">Comerciales</option>
                <option value="Privadas">Privadas</option>
                <option value="Carga">Carga</option>
            </select>

            <input type="submit" value="Registrar Aerolinea" class="btn btn-success mt-4">
        </form>
    </main>
    <?php
        /**
         * para hacer llamado de archivos php, podemos utilizar
         * require() ---- require_once() => hacemos el llamado de un archivo solaemente una vez
         * include() ---- include_once() => hacemos el llamado de un archivo solaemente una vez
         * 
         * include
         */
        //include("./aerolineas.php"); //manejo advertencias (si algo falla en el archivo solo manda una advertencia y el proceso continua)

        require("./aerolineas.php"); //manejo de faltal error ( si algo falla me manda un error y detiene la ejecucion)

        //CAPTURA DE DATOS DEL FORMULARIO
        /**
         * VARIABLES MAGICAS / GLOBALES
         * $_POST[] = devuelve el dato que se ha ingresado en el formulario a travez del atributo "name" del input
         * 
         * isset() => verificamos si las variables / elementos no esten vacios
         */
        if(isset($_POST['nombre'], $_POST['identificador'], $_POST['numero_aviones'], $_POST['tipo'])){
            $nombre = $_POST['nombre'];
            $identificador = $_POST['identificador'];
            $numero_aviones = $_POST['numero_aviones'];
            $tipo = $_POST['tipo'];

            //echo $nombre;
            /**
             * Instanciamos la clase para crear el objeto de la aerolinea
             * new = operador que nos permite crear una instancia
             */
            $aerolinea = new Aerolinea($numero_aviones, $nombre, $identificador, $tipo);
            //print_r($aerolinea);
            $aerolinea->obtenerDatos();
        }
        
    ?>
</body>
</html>