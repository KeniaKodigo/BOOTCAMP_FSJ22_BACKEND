<?php

    $arreglo = [1,2,3,4.56,8];
    $arreglo_frutas = array("manzana","peras","melocotones");

    #Objetos {} / console.log 
    #formas de imprimir variables
    /**
     * echo => imprime cadenas
     * print_r
     * var_dump
     */
    $cadena = "Hola";
    echo "<h2>Hola desde PHP</h2>" . $cadena;
    echo "<h2>Hola desde PHP</h2> $cadena";

    print_r($arreglo);
    echo "<br>";
    var_dump($arreglo);

    //definicion de constantes
    define("PI", 3.1416);
    echo "<br>";
    const DUI = 18572673;
    echo DUI;

    function decirHola() {
	    echo "¡Hola, Mundo!";
	}
	
	decirHola();
	$numero = 2;
	function saludar($nombre) {
        global $numero;
	    echo "¡Hola, $nombre!";
	}

    echo $numero;
	saludar("Ana");
?>