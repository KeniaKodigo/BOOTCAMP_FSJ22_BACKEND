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
    // $vocales = ['a', 'e', 'i', 'o', 'u', 'á', 'é', 'í', 'ó', 'ú', 'A', 'E', 'I', 'O', 'U', 'Á', 'É', 'Í', 'Ó', 'Ú'];

    //true / false
    $contador = 0;

    // Convertir la cadena a un array de caracteres
    $caracteres = mb_str_split($cadena);
    
    for ($i = 0; $i < count($caracteres); $i++) {
        if (preg_match('/[aeiouáéíóúAEIOUÁÉÍÓÚ]/u', $caracteres[$i])) {
            $contador++;
        }
    }
    return $contador;
}
echo "<br>";
//$cadena = "Hola, ¿cómo estás?";
$cadena = "murcielago";
echo "Número de vocales: " . contarVocalesV2($cadena);

/**
 * En base al siguiente arreglo de notas [7,8,6.5,5,4,9,8.2]
 * - Obtener cuantos alumnos aprobaron (para aprobar la nota debe ser mayor o igual a 7)
 * - Obtener cuantos alumnos estan en recuperacion (deben tener una nota entre 5 y 6.9)
 * - Obtener cuantos alumnos reprobaron
 */

//DO WHILE

function iterarDoWhile(){
    //global $notas, $aprobados, $recuperacion, $reprobados;
    $aprobados = 0;
    $recuperacion = 0;
    $reprobados = 0;
    $notas = [7,8,6.5,5,4,9,8.2];

    do{
        $nota = array_shift($notas); //devuelve el primer elemento
        if($nota >= 7){
            $aprobados++;
        }elseif($nota >= 5 && $nota <= 6.9){
            $recuperacion++;
        }else{
            $reprobados++;
        }
    }while(count($notas) > 0);

    echo "Alumnos aprobados: ". $aprobados. "\n";
    echo "Alumnos en recuperación: ". $recuperacion. "\n";
    echo "Alumnos reprobados: ". $reprobados. "\n"; 
}

iterarDoWhile();


function iterarDowhile2($notas){
    $apro = 0;
    $rec = 0;
    $rep= 0;
    $i = 0;
    do {
        if ($notas[$i] >= 7) {
            $apro++;
        } elseif ($notas[$i] >= 5 && $notas[$i] < 7) {
            $rec++;
        } else {
            $rep++;
        }
        $i++;
    }while ($i < count($notas));
    return [
        'aprobados' => $apro,
        'recuperacion' => $rec,
        'reprobados' => $rep
    ];
}
$notas = [7,8,6.5,5,4,9,8.2];
$resultados = iterarDowhile2($notas);
echo "Alumnos aprobados: " . $resultados['aprobados'] . "\n";
echo "Alumnos en recuperación: " . $resultados['recuperacion'] . "\n";
echo "Alumnos reprobados: " . $resultados['reprobados'] . "\n";

//FOREACH => iterar arreglo
$frutas = ["🍎", "🍌", "🍇"]; //arreglo indexado
foreach($frutas as $fruta){
    echo "<br>" . $fruta . "<br>";
}

//arreglo de objetos

?>