<?php

//Abierto / Cerrado
//cerrada a modificacion y abierta a extension
class ProcesadorDePagos1 {
    public function procesarPago($metodo, $monto) {
        if ($metodo == 'PayPal') {
            // Lógica para procesar pago con PayPal
            echo "Procesando pago de $monto con PayPal";
        } elseif ($metodo == 'TarjetaCredito') {
            // Lógica para procesar pago con Tarjeta de Crédito
            echo "Procesando pago de $monto con Tarjeta de Crédito";
        } else {
            throw new Exception("Método de pago no soportado");
        }
    }
}
// $procesador = new ProcesadorDePagos1();
// $procesador->procesarPago('PayPal', 100);
// $procesador->procesarPago('TarjetaCredito', 200);

//Refactorizando nuestro codigo
interface StrategyPago{
    public function procesar($monto);
}

//estrategias (formas de pago)
class Paypall implements StrategyPago{
    public function procesar($monto)
    {
        // Lógica para procesar pago con PayPal
        echo "Procesando pago de $monto con PayPal";
    }
}

class TarjetaCredito implements StrategyPago{
    public function procesar($monto)
    {
        // Lógica para procesar pago con PayPal
        echo "Procesando pago de $monto con Tarjeta de Crédito";
    }
}

//Pueda manejar en una clase las estrategias
class ProcesarPago{
    private $strategy; //Para saber que estrategia va escoger el usuario

    //metodo donde vamos a capturar la estrategia
    public function setStrategy(StrategyPago $estrategia){ //Paypall, TarjetaCredito
        $this->strategy = $estrategia;
    }

    //devolvemos el comportamiento de la estrategia seleccionada
    public function getStrategy($monto){
        $this->strategy->procesar($monto); //comportamiento
    }
}
//Ejecutando la clase
$pago = new ProcesarPago();

$pago->setStrategy(new Paypall);
$pago->getStrategy(500); //va procesar el pago en base a la estrategia que escogio la persona
echo "<br>";
$pago2 = new ProcesarPago();
$pago2->setStrategy(new TarjetaCredito);
$pago2->getStrategy(1100);

?>