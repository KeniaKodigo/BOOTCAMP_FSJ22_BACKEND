<?php
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
$procesador = new ProcesadorDePagos1();
$procesador->procesarPago('PayPal', 100);
$procesador->procesarPago('TarjetaCredito', 200);



?>