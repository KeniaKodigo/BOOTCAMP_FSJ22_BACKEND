<?php

/**
* Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. La creación de los personajes dependerá del nivel del juego:

*- En el nivel fácil se creará un personaje "Esqueleto".
*- En el nivel difícil se creará un personaje "Zombi".
*- Debes aplicar el patrón de diseño Factory para la creación de los personajes. */

//METODO DE FABRICA: Superclase (fabrica), las clases hijas puedan crear sus propios objetos

//Super clase (interfaz, clase abstracta)
interface Personaje{
    public function ataque();
    public function velocidad();
}

#clases concretas para la creacion de los personajes
class Esqueleto implements Personaje{
    public function ataque()
    {
        return "El esqueleto ataca con un hueso";
    }

    public function velocidad()
    {
        return "El esqueleto corre rapido";
    }
}

class Zombie implements Personaje{
    public function ataque()
    {
        return "El zombie ataca con un cuchillo y bomba";
    }

    public function velocidad()
    {
        return "El zombie corre lento";
    }
}

//En que momento vamos a crear los personajes? (Nivel)
//Clase donde vamos a manejar los productos de la fabrica
class Juego{
    //la clase maneja los productos de la fabrica
    public static function crearPersonajes($nivel_juego){

        switch($nivel_juego){
            case "Nivel Facil":
                //crear esqueletos
                $esqueleto = new Esqueleto();
                echo $esqueleto->ataque();
                break;
            case "Nivel Dificil":
                $zombie = new Zombie();
                echo $zombie->ataque();
                break;

            default:
                echo "Selecciona un nivel valido";
        }
    }
}

Juego::crearPersonajes("Nivel Facil"); //crear al personaje
echo "<br>";
Juego::crearPersonajes("Nivel Dificil");
echo "<br>";

//Una forma de crear personajes
class GestionPersonajes{
    public static function crearPersonajes(Personaje $personaje){ //Me obliga a mandar una instancia de una clase (new clase)
        echo "Ataque: " . $personaje->ataque() . "<br>";
        echo "Velocidad: " . $personaje->velocidad() . "<br>";
    }
}

GestionPersonajes::crearPersonajes(new Esqueleto);
GestionPersonajes::crearPersonajes(new Zombie);


?>