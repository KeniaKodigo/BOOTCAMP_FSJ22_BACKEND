<?php
#Conectarme a la bd
class Database {
    private $connection;

    public function __construct() {
        //configurando la conexion de la bd
        $this->connection = new PDO('mysql:host=localhost;dbname=empresa', 'usuario', 'contraseña');
    }

    //ejecutando la conexion
    public function getConnection() {
        return $this->connection;
    }
}

//estamos creando instancias
$db1 = new Database();
//otro usuario
$db2 = new Database();
//otro user
$db3 = new Database();


#Refactorizando el codigo con el patron Singleton

class DatabaseSingleton{
    
    //creamos un atributo estatico, vamos  verificar si la instancia existe
    private static $instancia = null;
    //atributo que recoge la informacion de la bd
    private $connection;

    private function __construct() {
        //configurando la conexion de la bd
        $this->connection = new PDO('mysql:host=localhost;dbname=empresa', 'usuario', 'contraseña');
    }

    //metodo que valide si la instancia existe o no existe
    public static function getInstancia(){
        if(self::$instancia == null){
            //crear la instancia de la base de datos
            self::$instancia = new Database();
        }
        //retornamos la instancia que ya fue creada
        return self::$instancia;
    }

    //ejecutando la conexion
    public function getConnection() {
        return $this->connection;
    }

}

//Primera instancia
$db1 = DatabaseSingleton::getInstancia(); //creo la instancia
$bd2 = DatabaseSingleton::getInstancia(); //reutilizando la instancia que ya fue creada
$bd3 = DatabaseSingleton::getInstancia(); //reutilizando
$bd4 = DatabaseSingleton::getInstancia();


?>