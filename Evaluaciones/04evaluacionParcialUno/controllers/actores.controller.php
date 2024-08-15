<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if($method == "OPTIONS") {die();}

//TODO: controlador de actores

require_once('../models/actores.model.php');
//error_reporting(0);
$actores = new Actores;

switch ($_GET["op"]) {
        //TODO: operaciones de actores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los actores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase actores.model.php
        $datos = $actores->todos(); // Llamo al metodo todos de la clase actores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $actor_id = $_POST["actor_id"];
        $datos = array();
        $datos = $actores->uno($actor_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un actor en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];

        $datos = array();
        $datos = $actores->insertar($nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un actor en la base de datos
    case 'actualizar':
        $actor_id = $_POST["actor_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $nacionalidad = $_POST["nacionalidad"];
        $datos = array();
        $datos = $actores->actualizar($actor_id, $nombre, $apellido, $fecha_nacimiento, $nacionalidad);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un actor en la base de datos
    case 'eliminar':
        $actor_id = $_POST["actor_id"];
        $datos = array();
        $datos = $actores->eliminar($actor_id);
        echo json_encode($datos);
        break;
}
