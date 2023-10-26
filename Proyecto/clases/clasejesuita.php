<?php

//Clase creada para la tabla jesuita
class  claseJesuita{
    private $conexion;

    //Constructor de la clase
    function __construct()
    {
        //require '../configuracion/config.php';
        require '/xampp/htdocs/2DAW/DWS/POO/Proyecto/configuracion/config.php';

        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    //Añade un jesuita a la base de datos
    function anhadir($idJesuita, $nombreJesuita, $firmaJesuita)
    {
        $sql = "INSERT INTO jesuita(idjesuita,nombre,firma) VALUES ('" . $idJesuita . "','" . $nombreJesuita . "','" . $firmaJesuita . "');";

        if ($this->conexion->query($sql)) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    //Borra un jesuita en concreto.
    function borrar($nombreJesuita)
    {
        $sql = "DELETE FROM jesuita WHERE nombre='".$nombreJesuita."';";

        //Query si no es select devuelve true o false
        if ($this->conexion->query($sql)) {
            $this->cerrarConexion();
            return true;
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    //Modifica la firma de un jesuita
    function modificar($id, $firma)
    {
        $sql = "UPDATE jesuita SET firma='" . $firma . "' where idJesuita='" . $id . "';";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    //Devuelve el listado de jesuitas hecho en la consulta a la base de datos
    function listado()
    {
        $sql = "SELECT * FROM jesuita";

        $resultado = $this->conexion->query($sql);

        $this->cerrarConexion();
        return $resultado;
    }

    //Hace una consulta de un jesuita con un determinado id
    function consultarJesuita($id)
    {
        $sql = "SELECT * FROM jesuita where idJesuita='" . $id . "';";
        $resultado = $this->conexion->query($sql);

        return $resultado->fetch_array();
    }

    //Cierra la conexion
    function cerrarConexion()
    {
        $this->conexion->close();
    }
}