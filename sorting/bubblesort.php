<?php

function bubbleSort($array){

    /**
     * ciclo que verifica si tengo que volver a entrar al segundo bucle
     */
    for($i = 0; $i < count($array); $i++){
        /**
         * [5,3,8,4,6]
         * $i = 0
         * 5 > 3
         * temporal = 3
         * [3,5,8,4,6]
         * 5 > 8
         * 8 > 4
         * temporal = 4
         * [3,5,4,8,6]
         * 8 > 6
         * temporal = 6
         * [3,5,4,6,8]
         * 
         * $i = 1
         * 3 > 5
         * 5 > 4
         * temporal = 4
         * [3,4,5,6,8]
         * ...
         * $i = 2
         * ..
         */
        echo "posicion del primer ciclo" . $i . "<br><br>";
        //segundo ciclo se encarga de evaluar todos los elementos y hacer los intercambios
        for($j = 0; $j < count($array) - 1; $j++){
            echo "posicion del segundo ciclo" . $j . "<br><br>";
            echo "valor del arreglo" . $array[$j] . "<br><br>";
            //condicionamos si el elemento es mayor al siguiente
            if($array[$j] > $array[$j + 1]){
                //intercambio

                //almacenamos en una variable el valor de la posicion siguiente
                $temporal =  $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $temporal;
            }
        }

    }
    echo json_encode($array);
}

bubbleSort([5,3,8,4,-6])

?>