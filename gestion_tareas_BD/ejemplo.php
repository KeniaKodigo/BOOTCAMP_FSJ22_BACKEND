
<?php
require_once "./clases/Tareas.php";

$tareas = Tareas::getTareas();
echo json_encode($tareas);

