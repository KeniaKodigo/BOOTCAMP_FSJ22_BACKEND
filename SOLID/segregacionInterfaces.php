<?php

interface GestionarTareas{
    public function crearTarea();
    public function cambiarEstado();
    public function cargarTareas();
}

interface UpdateTarea{
    public function cambiarEstado();
}

interface CreateTarea{
    public function crearTarea();
}

interface ReadTarea{
    public function cargarTareas();
}

class Emplead implements UpdateTarea{
    public function cambiarEstado()
    {
        
    }
}

class Gerent implements CreateTarea, UpdateTarea, ReadTarea{
    public function crearTarea()
    {
        
    }

    public function cambiarEstado()
    {
        
    }

    public function cargarTareas()
    {
        
    }
}

?>