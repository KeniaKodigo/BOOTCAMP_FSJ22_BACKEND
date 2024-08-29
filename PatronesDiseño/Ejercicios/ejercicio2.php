<?php
/**
 * Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. Al compartir archivos como Word7, Excel7, Power Point7, surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos archivos independientemente de que sean de versiones anteriores.

 *- Para ello, aplica el patrón de diseño Adapter. */

//clases incompatibles (windows 10 acepte un word7)

//Super clase que va manejar los documentos
interface Docs{
    public function leer();
}

class Word implements Docs{
    protected $archivo;

    public function __construct($archivo)
    {
        $this->archivo = $archivo;
    }

    public function leer()
    {
        echo "Leyendo un archivo word7";
    }
}

class Excel implements Docs{
    protected $archivo;

    public function __construct($archivo)
    {
        $this->archivo = $archivo;
    }

    public function leer()
    {
        echo "Leyendo un archivo excel7";
    }
}

//Creando la clase Adaptadora
class AdapterDocs implements Docs{
    protected $archivo;

    public function __construct(Docs $archivo) //new Word
    {
        $this->archivo = $archivo;
    }

    public function leer()
    {
        echo "Adaptando un archivo para windows 10<br>";
        //ejecutando el metodo "leer" del documento seleccionado
        $this->archivo->leer(); //el comportamiento del word
    }
}

echo "<h2>Windows 7</h2>";
$archivo1 = new Excel("datos.xlsx");
$archivo1->leer();

echo "<h2>Windows 10</h2>";
//sistema windows 10
$adaptador1 = new AdapterDocs(new Word("patrones.doc"));
$adaptador1->leer();
echo "<br>";
$adaptador2 = new AdapterDocs(new Excel("ciencia.xlsx"));
$adaptador2->leer();



?>