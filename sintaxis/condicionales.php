<?php
/**
 * if-else
 * if-else if-else
 * switch
 * operador ternario (optima para el if-else)
 */

/**
 * verificar si un numero terminaba en 4
 * numero mod(%) 10 == 4
 */
function terminarNumero4($numero){
    if($numero % 10 == 4){
        return "El numero si termina en 4";
    }else{
        return "El numero No termina en 4";
    }
}
echo terminarNumero4(104);
echo "<br>";
echo terminarNumero4(205);

function operadorTernarioNumero($numero){
    return $numero % 10 == 4 ? "El numero $numero si termina en 4" : "El numero $numero NO termina en 4";
}
echo "<br>";
echo operadorTernarioNumero(230);

function switchVerificarImpuesto($tipo_vehiculo){
    $mensaje = "";
    switch(strtolower($tipo_vehiculo)){
        case "vehiculo particular":
            $mensaje = "Debes pagar $0.75 centavos";
            break;
        case "autobus":
            $mensaje = "Debes pagar $1.50";
            break;
        case "microbus":
            $mensaje = "Debes pagar $1.25";
            break;
        case "mototaxi":
            $mensaje = "Debes pagar $0.50 centavos";
            break;
        case "moto":
            $mensaje = "Debes pagar $0.30 centavos";
            break;
        default:
            $mensaje = "Debes pagar $3.00";
    }
    return $mensaje;
}
echo "<br>";
// echo switchVerificarImpuesto(strtolower("MOTO"));
echo switchVerificarImpuesto("MOTO");

function ifElseifVerificarImpuesto($tipo){
    if($tipo == "vehiculo particular"){
        $mensaje = "Debes pagar $0.75 centavos";
    }else if($tipo == "microbus"){
        $mensaje = "Debes pagar $1.25";
    }else if($tipo == "moto"){
        $mensaje = "Debes pagar $0.30 centavos";
    }else{
        $mensaje = "Debes pagar $3.00";
    }

    return $mensaje;
}
echo "<br>";
echo ifElseifVerificarImpuesto("microbus");



?>