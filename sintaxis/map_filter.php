<?php

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

echo "<h2>Uso del map()</h2>";
$informacion = array_map(function($bootcamp){
    //codigo
    return "Bootcamp: " . $bootcamp["titulo"] . " Duracion del bootcamp " . $bootcamp["duracion"];
}, $array_bootcamps);

echo json_encode($informacion);

//array_filter => devuelve un nuevo arreglo en base a una condicion
echo "<h2>Uso del filter()</h2>";
$bootcamps_filtrado = array_filter($array_bootcamps, function($bootcamp){
    //condicionante
    return $bootcamp["duracion"] == 3;
});
echo json_encode($bootcamps_filtrado);