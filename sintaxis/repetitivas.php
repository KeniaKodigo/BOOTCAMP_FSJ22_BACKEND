<?php
/**
 * while
 * do while
 * foreach
 * for
 */

 //for
function contador($numero){
    for($i = 0; $i <= $numero; $i++){
        echo $i . "<br>";
    }
}
contador(30);

/**
 * count() => devuelve el tamaño de un arreglo
 * strlen() => devuelve el tamaño de una cadena
 */

function iterarNumeros($array){
    //iterar arreglo
    for($i = 0; $i < count($array); $i++){
        echo "Posicion: $i -- Valor: $array[$i]<br>";
    }
}
iterarNumeros([2,3,4,78]);

//while
function contarVocales($texto){
    $i = 0;
    $contador_vocales = 0;
    while($i < strlen($texto)){
        //proceso..
        if($texto[$i] == "a" || $texto[$i] == "e" || $texto[$i] == "i" || $texto[$i] == "o" || $texto[$i] == "u"){
            $contador_vocales++;
        }
        $i++;
    }

    echo "El texto: $texto tiene $contador_vocales vocales";
}

contarVocales("murcielago");


function contarVocalesV2($cadena){
    $vocales = ['a', 'e', 'i', 'o', 'u', 'á', 'é', 'í', 'ó', 'ú', 'A', 'E', 'I', 'O', 'U', 'Á', 'É', 'Í', 'Ó', 'Ú'];

    //true / false
    $contador = 0;
    for ($i = 0; $i < strlen($cadena); $i++) {
        if (preg_match('/aeiouAEIOU/', $cadena[$i])) {
            $contador++;
        }
    }
    return $contador;
}
echo "<br>";
$cadena = "Hola, ¿cómo estás?";
echo "Número de vocales: " . contarVocalesV2($cadena);

?>