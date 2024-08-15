<?php

class ClaseConectar {

    public $conexion;
    protected $db;
    private $host = "localhost";
    private $usuario = "root";
    private $password = "Frn01190*_=ali@5";
    private $base = "cine";

    public function ProcedimientoParaConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->base);
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        if ($this->conexion->connect_errno) {
            die("Error al conectar con el servidor: " . $this->conexion->connect_error);
        }
        $this->db = $this->conexion;
        if($this->db == false) die("Error al conectar con la base de datos: " . $this->conexion->connect_error);

        return $this->conexion;
    }
}

?>