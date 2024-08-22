<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestion Tareas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php 
                //validando las vistas del gerente y empleado
                if($_SESSION['cargo'] == "Gerente"){
            ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home_gerente.php">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./lista_tareas.php">Lista Tareas</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="./home_empleado.php">Tareas Asignadas</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="./index.php" class="btn btn-danger">Cerrar Sesion</a>
            </li>
        </ul>
        </div>
    </div>
</nav>