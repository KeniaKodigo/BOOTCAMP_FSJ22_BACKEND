<?php

function insertionSort($array){

    //ciclo para verificar elemento por elemento del arreglo
    for($i = 0; $i < count($array); $i++){
        /**
         * [5,3,8,4,6]
         * [3,5,8,4,6]
         * [3,5,4,8,6]
         * [3,4,5,8,6]
         * $i = 0,1, 2, 3, 4
         * $valor_actual = 5, 3, 8, 4
         * $j = -1, 0, 1, 2
         * $array[$j] = 5, 5, 8
         */
        $valor_actual = $array[$i];
        //variable para retroceder una posicion
        $j = $i - 1;

        //iteramos los elementos que estan atras del elemento a evaluar
        while($j >= 0 && $valor_actual < $array[$j]){
            //intercambio
            $array[$j + 1] = $array[$j];
            $array[$j] = $valor_actual;
            //decrementando la j
            $j = $j - 1; //-1, 1, 0
        }
    }
    echo json_encode($array);
}

insertionSort([5,3,8,4,6])

?>