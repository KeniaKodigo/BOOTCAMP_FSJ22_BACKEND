<?php
/**
 * COLAS: siguen el principio FIFO (el primero en entrar, es el primero en salir)
 */

$arreglo_datos = ["PHP","JAVASCRIPT","C#","PYTHON"];

array_push($arreglo_datos, "RUST");
array_push($arreglo_datos, "GO");
array_push($arreglo_datos, "JAVA");
/**
 * eleminamos el primer elemento del arreglo
 */
array_shift($arreglo_datos);
echo json_encode($arreglo_datos);
echo "<br>";
$lista_cola = new SplQueue(); //creamos un objeto de tipo cola
//agregar elementos a la cola
$lista_cola->enqueue("Next JS");
$lista_cola->enqueue("Vite JS");
$lista_cola->enqueue("Angular");
$lista_cola->enqueue("Vue");
print_r($lista_cola);
echo "<br>";
//eleminar el primer elemento de la cola
$lista_cola->dequeue();
print_r($lista_cola);


?>