<?php

/** POO (registro de aerolineas) */
class Aerolinea{
    protected $numero_aviones;
    public $nombre;
    public $identificador;
    public $tipo_aerolinea;

    /** constructor() => inicializar un objeto */
    public function __construct($num_aviones, $nombre, $codigo, $tipo)
    {
        //this => hace referencia a los atributos y metodos de la clase
        $this->numero_aviones = $num_aviones;
        $this->nombre = $nombre;
        $this->identificador = $codigo;
        $this->tipo_aerolinea = $tipo;
    }

    //metodo para verificar la informacion de la aerolinea
    public function obtenerDatos(){
        echo "<div class='alert alert-primary' role='alert'>
                <strong>Aerolinea: </strong> $this->nombre<br>
                <strong>Identificador: </strong> $this->identificador<br>
                <strong>Numero de aviones: </strong> $this->numero_aviones<br>
                <strong>Tipo Aerolinea: </strong> $this->tipo_aerolinea
            </div>";
    }
}

?>