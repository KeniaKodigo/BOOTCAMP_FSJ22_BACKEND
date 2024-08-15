<?php
#clase Padre
class TaskDeveloper{

    public function codificar(){

    }

    public function testear(){

    }

    public function maquetar(){

    }

    public function analisarDatos(){

    }
}

class FullStack extends TaskDeveloper{
    public function analisarDatos(){
        throw new Exception("Un fullstack no analisa datos");
    }
}

class Frontend extends TaskDeveloper{

}

class QA extends TaskDeveloper{

}

class Backend extends TaskDeveloper{

}

/**
 * interfaces
 */

interface taskBackend{
    #obligatorios
    public function codificar();
    public function testear();
}

#La herencia multiple se simula con las interfaces, es decir que una clase puede implementar mas de una interfaz

interface taskFrontend{
    public function maquetar();
}

interface taskQA{
    public function testear();
}

class DevFullStack implements taskBackend, taskFrontend{
    public function codificar()
    {
        //code..
    }

    public function testear()
    {
        //code..
    }

    public function maquetar()
    {
        
    }
}

class DevBackend implements taskBackend{
    public function codificar()
    {
        //code..
    }

    public function testear()
    {
        //code..
    }
}

?>