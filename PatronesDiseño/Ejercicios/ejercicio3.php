<?php
/**Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator. */

//Añadir - quitar (opcional)
//Batman: bombas, cuchillo, lazos

interface Personajes{
    public function armas();
}

class DeadPool implements Personajes{

    public function armas()
    {
        return "Deadpool tiene puños";
    }
}

class Batman implements Personajes{

    public function armas()
    {
        return "Batman tiene batiboomeran";
    }
}


#Base decoradora
class DecoratorPersonajes implements Personajes{
    protected $personaje;

    public function __construct(Personajes $personaje)
    {
        $this->personaje = $personaje;
    }

    public function armas()
    {
        //imprimos el comportamiento de cada personaje
        return $this->personaje->armas();
    }
}

#decoradores
class Espada extends DecoratorPersonajes{

    public function armas()
    {
        //imprimos el comportamiento de cada personaje
        return parent::armas() . ", tambien tiene una espada";
    }
}

class Soga extends DecoratorPersonajes{

    public function armas()
    {
        //imprimos el comportamiento de cada personaje
        return parent::armas() . ", tambien tiene una soga";
    }
}

class Bombas extends DecoratorPersonajes{

    public function armas()
    {
        //imprimos el comportamiento de cada personaje
        return parent::armas() . ", tambien tiene bombas";
    }
}


//Decorando al personaje
echo "<h2>Personaje con su arma propia</h2>";
$deadpool = new DeadPool();
echo $deadpool->armas();
echo "<h2>Armas Extras</h2>";

$deadpool = new Soga($deadpool);
//$deadpool = new Espada($deadpool);
echo $deadpool->armas();
?>