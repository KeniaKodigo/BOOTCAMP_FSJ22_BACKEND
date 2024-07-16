<?php

//arreglo indexado: indica un arreglo que se basa en una posicion (index) numerica
$frutas = ["🍎", "🍌", "🍇"]; 

//arreglo asociativo: lo utilizamos cuando queremos asignar una clave y un valor

$bootcamp = array(
    "titulo" => "Bootcamp FSJr22",
    "tipo" => "FullStack",
    "descripcion" => "jnsjnjd",
    "duracion" => 6
);
//{}
//arreglo asociativo / arreglo multidimensional
//arreglo multidimensional = obtenemos un arreglo dentro de otro

$array_bootcamps = [
    [
        "titulo" => "Bootcamp FSJr22",
        "tipo" => "FullStack",
        "descripcion" => "jnsjnjd",
        "duracion" => 6,
        "tecnologias" => ["JavaScript", "PHP", "CSS"]
    ],
    array(
        "titulo" => "Bootcamp JavaDeveloper",
        "tipo" => "Java",
        "descripcion" => "jnsjnjd",
        "duracion" => 3,
        "tecnologias" => ["Java", "Intelling", "POO"]
    ),
    array(
        "titulo" => "Data Jr",
        "tipo" => "Data",
        "descripcion" => "jnsjnjd",
        "duracion" => 3,
        "tecnologias" => ["SQL", "Excel"]
    )
];

// print_r($array_bootcamps);

//agregar un nuevo bootcamp
$nuevo_bootcamp = array(
    "titulo" => "Python Developer",
    "tipo" => "python",
    "descripcion" => "jnsjnjd",
    "duracion" => 4,
    "tecnologias" => ["python", "fastapi","sqlachemy"]
);
array_push($array_bootcamps, $nuevo_bootcamp);
// echo "<br>";
// print_r($array_bootcamps);

//elimina el ultimo elemento del arreglo
array_pop($array_bootcamps);

//json_encode => funcion que formate un arreglo a json
echo json_encode($array_bootcamps, true);
//json_decode => decodifica un json a un arreglo




