<?php
//TODO: Clase de Provedores
require_once('../config/config.php');
class Actores
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from actores
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `actores`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($actor_id) //select * from actores where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `actores` WHERE `actor_id`=$actor_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Nombre, $Apellido, $fecha_nacimiento, $nacionalidad) //insert into actores (nombre, apellido, fechanac, nacionalidad) values ($nombre, $apellido, $fecha_nacimiento, $nacionalidad)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `actores` ( `nombre`, `apellido`, `fecha_nacimiento`, `nacionalidad`) VALUES ('$Nombre','$Apellido','$fecha_nacimiento','$nacionalidad')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($actor_id, $Nombre, $Apellido, $fecha_nacimiento, $nacionalidad) //update actores set nombre = $nombre, apellido = $apellido, fecha_nacimiento = $fecha_nacimiento, nacionalidad = $nacionalidad where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `actores` SET `nombre`='$Nombre',`apellido`='$Apellido',`fecha_nacimiento`='$fecha_nacimiento',`nacionalidad`='$nacionalidad' WHERE `actor_id` = $actor_id";
            if (mysqli_query($con, $cadena)) {
                return $actor_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($actor_id) //delete from actores where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `actores` WHERE `actor_id`= $actor_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}