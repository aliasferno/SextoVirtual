<?php

    //Declaracion de variables
    $name = "Fernando Carrión";
    $number = 457;
    $numberAlt = 123;
    $float = 5.912;
    $boolean = true;
    $list = ['a', 'b', 'c', 'd', 'h', 1, 5, 6, 8];

    echo $name . '</br>';

    //Operaciones Aritmeticas

    $agg = $number + $numberAlt;
    $sup = $numberAlt - 67657;
    $mult = $number * $float;
    $div = $agg / $mult;

    echo "Los resultados de la operación 1 es: " . $agg . '</br>';
    echo "Los resultados de la operación 2 es: " . $sup . '</br>';
    echo "Los resultados de la operación 3 es: " . $mult . '</br>';
    echo "Los resultados de la operación 4 es: " . $div . '</br>';

    //Manipulación de cadenas

    $cadenaConcat = "es un estudiante de sexto virtual de Uniandes";

    $cadenaTotal = $name . ' ' . $cadenaConcat;
    $strLen = strlen($cadenaTotal);

    echo $cadenaTotal . '</br>';
    echo "La longitud de la cadena escrita es de " . $strLen . " caracteres </br>";

    //muestra de elemento de array de acuerdo a su índice

    echo "El elemento seleccionado del array List es: " . $list[3];

?>