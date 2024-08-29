<?php
/**Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT. Debes crear un programa donde se muestren todos estos tipos de salidas.
Para este propósito, aplica el patrón de diseño Strategy. */

//Patron de comportamiento

interface StrategyMensaje{
    //metodos (obligacion)
    public function mostrarMensaje($mensaje);
}

//formas de mostrar el mensaje
class Consola implements StrategyMensaje{

    public function mostrarMensaje($mensaje)
    {
        echo "Mensaje por consola: $mensaje";
    }
}

class JSON implements StrategyMensaje{

    public function mostrarMensaje($mensaje)
    {
        echo "Mensaje por formato JSON: $mensaje";
    }
}

class TXT implements StrategyMensaje{

    public function mostrarMensaje($mensaje)
    {
        echo "Mensaje via texto: $mensaje";
    }
}

//Clase que nos ayude a escoger la estrategia que necesita el usuario
class ProcesarMensaje{
    private $strategy; //va contener la estrategia seleccionada

    //metodo para captura la estrategia
    public function setStrategy(StrategyMensaje $mensaje){
        $this->strategy = $mensaje;
    }

    //metodo para devolver el comportamiento de la estrategia
    public function getStrategy($mensaje){
        $this->strategy->mostrarMensaje($mensaje);
    }
}

$mensaje = new ProcesarMensaje();
$mensaje->setStrategy(new Consola); //capturamos la estrategia
$mensaje->getStrategy("El lunes vemos base de datos");

// abstract class StrategyAb{
//     //atributos metodos (metodo obligatorio)
//     public $nombre;
//     public $telefono;

//     public function saludar(){
//         //code..
//     }

//     public abstract function prueba();
// }


?>