<?php

class Notificacion{

    public function enviarNotificacion($mensaje, $destinatario, $tipo){
        switch($tipo){
            case "correo electronico":
                //code
                break;

            case "slack":
                //code.
                break;

            case "whatsapp":
                //code
                break;
        }
    }   
}

#ser padre que permite heredar a las clases hijas
abstract class RedesSociales{
    protected $mensaje;
    #metodo obligatorio
    abstract function enviarNotificacion();

    public function saludar(){
        //code..
    }
}

class Slack extends RedesSociales{

    public function enviarNotificacion()
    {
        //proceso de slack
    }
}

class Whatsapp extends RedesSociales{

    public function enviarNotificacion()
    {
        //proceso de whatsapp
    }
}


?>