<?php

function quickSort($array){
    //validamos si el arreglos tienen mas de un elemento
    if(count($array) <= 1){
        return $array;
    }else{
        //proceso para ordenarlo
        /**
         * end() => captura el ultimo elemento del arreglo
         */
        $pivote = $array[0];
        $array_left = [];
        $array_right = [];

        for($i = 1; $i < count($array); $i++){
            if($array[$i] < $pivote){
                array_push($array_left, $array[$i]);
            }else{
                array_push($array_right, $array[$i]);
            }
        }
        return array_merge(quickSort($array_left), array($pivote), quickSort($array_right));
    }
}

echo json_encode(quickSort([5,3,8,4,6]));


?>