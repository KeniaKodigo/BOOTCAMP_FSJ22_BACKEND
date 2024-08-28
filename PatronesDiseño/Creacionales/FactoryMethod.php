<?php
//clase esta demasiada acoplada
class User {
    private $tipo;

    //solicito el tipo de usuario
    public function __construct($tipo) {
        $this->tipo = $tipo;
    }

    public function getTipo() {
        return $this->tipo;
    }
}

$admin = new User('Administrador'); //new Administrador
$cliente = new User('Cliente'); //new Cliente
$proveedor = new User('Proveedor'); //new Proveedor
echo $admin->getTipo();

#REFACTORIZANDO EL CODIGO CON EL PATRON METODO DE FABRICA

// abstract class FabricaUsuarios{
//     //metodo abstracto
//     abstract function getTipo();
// }
//manejar los productos en concreto
interface FabricaUser{
    public function getTipo();
}

//clases que se van a convertir en los objetos a crear
class Administrador implements FabricaUser{
    public function getTipo()
    {
        return "Tu eres un administrador, tus permison son globales";
    }
}

class Cliente implements FabricaUser{
    public function getTipo()
    {
        return "Tu eres un cliente, solo puedes ver y comprar productos";
    }
}

class Proveedor implements FabricaUser{
    public function getTipo()
    {
        return "Tu eres un proveedor, solo puedes gestionar tus productos";
    }
}

//Uso del metodo de fabrica
class Usuarios{
    //hace el uso de los tipos de usuario
    public static function crearUsuario($tipo){
        switch($tipo){
            case "Administrador":
                //creamos un nuevo administrador
                return new Administrador();

            case "Cliente":
                return new Cliente();

            case "Proveedor":
                return new Proveedor();

            default:
                return "Tipo de usuario invalido";
        }
    }
}

$admin = Usuarios::crearUsuario('Administrador'); //new Administrador
$cliente = Usuarios::crearUsuario('Cliente'); //new Cliente
$admin = new Administrador();


?>