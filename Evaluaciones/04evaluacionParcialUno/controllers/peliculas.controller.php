<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

//TODO: controlador de peliculas

require_once('../models/peliculas.model.php');
//error_reporting(0);
$peliculas = new Peliculas;

switch ($_GET["op"]) {
        //TODO: operaciones de peliculas

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los peliculas
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase peliculas.model.php
        $datos = $peliculas->todos(); // Llamo al metodo todos de la clase peliculas.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $pelicula_id = $_POST["pelicula_id"];
        $datos = array();
        $datos = $peliculas->uno($pelicula_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un pelicula en la base de datos
    case 'insertar':
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $anio = $_POST["anio"];
        $director = $_POST["director"];

        $datos = array();
        $datos = $peliculas->insertar($titulo, $genero, $anio, $director);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un pelicula en la base de datos
    case 'actualizar':
        $pelicula_id = $_POST["pelicula_id"];
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $anio = $_POST["anio"];
        $director = $_POST["director"];
        $datos = array();
        $datos = $peliculas->actualizar($pelicula_id, $titulo, $genero, $anio, $director);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un pelicula en la base de datos
    case 'eliminar':
        $pelicula_id = $_POST["pelicula_id"];
        $datos = array();
        $datos = $peliculas->eliminar($pelicula_id);
        echo json_encode($datos);
        break;
}
