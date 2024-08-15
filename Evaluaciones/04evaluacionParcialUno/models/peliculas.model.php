<?php
//TODO: Clase de Provedores
require_once('../config/config.php');
class Peliculas
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from peliculas
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `peliculas`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($pelicula_id) //select * from peliculas where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `peliculas` WHERE `pelicula_id`=$pelicula_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($titulo, $genero, $anio, $director) //insert into peliculas (titulo, genero, anio, director) values ($titulo, $genero, $anio, $director)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `peliculas` ( `titulo`, `genero`, `anio`, `director`) VALUES ('$titulo','$genero','$anio','$director')";
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
    public function actualizar($pelicula_id, $titulo, $genero, $anio, $director) //update peliculas set titulo = $titulo, genero = $genero, anio = $anio, director = $director where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `peliculas` SET `titulo`='$titulo',`genero`='$genero',`anio`='$anio',`director`='$director' WHERE `pelicula_id` = $pelicula_id";
            if (mysqli_query($con, $cadena)) {
                return $pelicula_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($pelicula_id) //delete from peliculas where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `peliculas` WHERE `pelicula_id`= $pelicula_id";
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