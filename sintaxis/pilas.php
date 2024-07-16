<?php
/**
 * PILAS: siguen el principio LIFO (ultimo en entrar, primero en salir)
 */

$arreglo_datos = ["PHP","JAVASCRIPT","C#","PYTHON"];
//agregando elemento al final
array_push($arreglo_datos, "JAVA","Go");

//eliminando el ultimo elemento
array_pop($arreglo_datos);
//echo json_encode($arreglo_datos, true);

//Creando una pila con la clase SplStack (clase definida por php)
$pila_frameworks = new SplStack(); //objeto de tipo pila
//agregando elementos a la pila
$pila_frameworks->push("Laravel");
$pila_frameworks->push("FastAPI");
$pila_frameworks->push("React JS");

//eliminando el ultimo elemento
$pila_frameworks->pop();
print_r($pila_frameworks);





