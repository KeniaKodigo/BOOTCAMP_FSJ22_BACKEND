<?php

//Creamos una clase para dar estructura a un Nodo (data, next)
class Nodo{
    //capturar el valor que va ir en la lista
    public $data;
    //capturar la referencia del elemento siguiente
    public $next;

    /**
     * creamos el construtor(): inicializar nuestro objeto
     */
    public function __construct($valor)
    {
        $this->data = $valor;
        $this->next = null;
    }
}

class ListaEnlazada{
    //atributo que va hacer la referencia del primer nodo
    public $head;

    //inicializamos un constructor con datos predefinidos
    public function __construct()
    {
        $this->head = null;
    }

    //metodo para agregar un nuevo nodo
    public function agregarNodo($valor){
        //creamos la instancia de la clase Nodo
        $nuevo = new Nodo($valor);
        //condicionamos si es el primer nodo actualizamos el atributo head con el valor que nos ingreso el usuario
        if($this->head == null){
            $this->head = $nuevo;
        }
        //cuando ya tengamos mas de un nodo, necesitamos iterar e ir guardando los elementos
        else{
            $current = $this->head;
            while($current->next !== null){
                $current = $current->next;
            }
            $current->next = $nuevo;
        }
    }

    //metodo para mostrar la lista
    public function mostrarLista(){
        //current va contener el valor del primer nodo
        $current = $this->head;
        while($current !== null){
            //imprimiendo el valor de cada nodo
            echo $current->data . " ";
            $current = $current->next;
        }
    }

    //metodo para eliminar un nodo
    public function eliminarNodo($valor){
        //primero comprobamos si la lista esta vacia
        if($this->head == null){
            return "No hay elemento en la lista";
        }

        //condicionamos si la persona quiere eliminar el primer elemento
        if($this->head->data == $valor){
            //actualizamos la lista con el siguiente nodo
            $this->head = $this->head->next;
            return;
        }

        //si la persona quiere eliminar otro elemento iteramos la lista y actualizamos
        $current = $this->head;
        while($current->next !== null && $current->next->data !== $valor){
            $current = $current->next;
        }

        //actualizamos la lista, eliminando el elemento que el usuario ingreso
        if($current->next !== null){
            $current->next = $current->next->next;
        }else{
            return "El nodo que ingreso es incorrecto";
        }
    }
}

$lista_frutas = new ListaEnlazada();
$lista_frutas->agregarNodo("Fresa");
$lista_frutas->agregarNodo("Uvas");
$lista_frutas->agregarNodo("Melocotones");
$lista_frutas->agregarNodo("Melon");

//eliminando el primer elemento
//$lista_frutas->eliminarNodo("Fresa");

//eliminando otro elemento
$lista_frutas->eliminarNodo("Melocotones");

//print_r($lista_frutas);
//mostrando la lista
$lista_frutas->mostrarLista();


?>