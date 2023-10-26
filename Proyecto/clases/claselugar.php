<?php

//Clase creada para la tabla lugar
class  claseLugar{
    private $conexion;

    //Constructor de la clase
    function __construct()
    {
        //require '../configuracion/config.php';
        require '/xampp/htdocs/2DAW/DWS/POO/Proyecto/configuracion/config.php';

        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    /*Añade un jesuita a la base de datos*/
    function anhadir($ip, $lugar, $descripcion)
    {
        $sql = "INSERT INTO lugar(ip,lugar,descripcion) VALUES ('" . $ip . "','" . $lugar . "','" . $descripcion . "');";

        if ($this->conexion->query($sql)) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    /*Borra un jesuita en concreto.*/
    function borrar($lugar)
    {
        $sql = "DELETE FROM lugar WHERE lugar='" . $lugar . "';";

        //Query si no es select devuelve true o false
        if ($this->conexion->query($sql)) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    function modificar($ip, $descripcion)
    {
        $sql = "UPDATE lugar SET descripcion='" . $descripcion . "' where ip='" . $ip . "';";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /*Devuelve el listado de jesuitas hecho en la consulta a la base de datos*/
    function listado()
    {
        $sql = "SELECT * FROM lugar";

        $resultado = $this->conexion->query($sql);

        $this->cerrarConexion();
        return $resultado;
    }

    /*Hace una consulta de un jesuita con un determinado id*/
    function consultarLugar($ip)
    {
        $sql = "SELECT * FROM lugar where ip='" . $ip . "';";
        $resultado = $this->conexion->query($sql);

        return $resultado->fetch_array();
    }


    function cerrarConexion()
    {
        $this->conexion->close();
    }
}