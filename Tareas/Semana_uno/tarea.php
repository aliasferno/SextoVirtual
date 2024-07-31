<?php

    //Declaracion de variables
    $name = "Fernando Carrión";
    $number = 457;
    $numberAlt = 123;
    $float = 5.912;
    $boolean = true;
    $list = ['a', 'b', 'c', 'd', 'h', 1, 5, 6, 8];

    echo $name;

    //Operaciones Aritmeticas

    $agg = $number + $numberAlt;
    $sup = $numberAlt - 67657;
    $mult = $number * $float;
    $div = $agg / $mult;

    echo "Los resultados de la operación 1 es: " . $agg;
    echo "Los resultados de la operación 2 es: " . $sup;
    echo "Los resultados de la operación 3 es: " . $mult;
    echo "Los resultados de la operación 4 es: " . $div;

    //Manipulación de cadenas

    $cadenaConcat = "es un estudiante de sexto virtual de Uniandes";

    $cadenaTotal = $name . ' ' . $cadenaConcat;

    echo $cadenaTotal;

?>