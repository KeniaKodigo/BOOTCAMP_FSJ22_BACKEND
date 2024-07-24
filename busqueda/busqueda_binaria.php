<?php
//El arreglo ya debe de estar ordenado
function busquedaBinaria($arreglo, $valor) {
    $inicio = 0;
    $fin = count($arreglo) - 1;
    
    while ($inicio <= $fin) {
        //posicion de en medio del arreglo
        $medio = intval(($inicio + $fin) / 2); //2 
        
        // Comprobamos si el valor está en el punto medio
        if ($arreglo[$medio] == $valor) {
            return $medio;
        }
        
        // Si el valor es menor, ignoramos la mitad derecha
        if ($arreglo[$medio] > $valor) {
            $fin = $medio - 1;
        }
        // Si el valor es mayor, ignoramos la mitad izquierda
        else {
            $inicio = $medio + 1; //3, 4
        }
    }
    
    // Si no encontramos el valor, retornamos -1
    return -1;
}

$results = busquedaBinaria([1,3,4,5,7,9], 3);
if($results != -1){
    echo "El elemento si se encontro y esta en la posicion $results";
}else{
    echo "El elemento no se encuentra en la coleccion de datos";
}