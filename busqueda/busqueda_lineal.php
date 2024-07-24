<?php

function busquedaLineal($arreglo, $valor) {
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i] == $valor) {
            return $i;
        }
    }
    return -1;
}

$results = busquedaLineal([3,5,1,4,7,9], 10);
if($results != -1){
    echo "El elemento si se encontro y esta en la posicion $results";
}else{
    echo "El elemento no se encuentra en la coleccion de datos";
}