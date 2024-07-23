<?php
//Funcion mezclar arrays izquierdo y derecho
function merge($left, $right) {
    
    $orderedArray = array();

    while(count($left) > 0 && count($right) > 0) {

        if($left[0] > $right[0]) {
            $orderedArray[] = $right[0];
            $right = array_slice($right, 1);
        } else {
            $orderedArray[] = $left[0];
            $left = array_slice($left, 1);
        }
    }

    //Caso el array de la izquierda quedo con valores: agregarlos todos a $orderedArray 
    while (count($left) > 0) {
        $orderedArray[] = $left[0];
        $left = array_slice($left, 1);
    }

    //Caso el array de la derecha quedo con valores: agregarlos todos a $orderedArray 
    while (count($right) > 0) {
        $orderedArray[] = $right[0];
        $right = array_slice($right, 1);
    }

    return $orderedArray;

}

//Algoritmo MergeSort
function mergeSort($array) {

    if (count($array) == 1) return $array;

    $mid = intval(count($array) / 2); //el valor medio
    $left = array_slice($array, 0, $mid); // crear array izquierdo
    $right = array_slice($array, $mid); // crear array derecho

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}

$arrayDesordenado = [10, 80, 30, 90, 40, 50, 70];
echo implode(" - ", mergeSort($arrayDesordenado));
?>