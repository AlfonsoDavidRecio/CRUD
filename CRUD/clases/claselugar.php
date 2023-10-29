<?php

//Clase creada para la tabla lugar
class  claseLugar{
    private $conexion;

    //Constructor de la clase
    function __construct()
    {
        //require '../configuracion/config.php';
        require '/xampp/htdocs/2DAW/DWS/POO/Proyecto/configuracion/configLocalhost.php';

        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    /*Añade un lugar a la base de datos*/
    function anhadir($ip, $lugar, $descripcion)
    {
        //Primero hago una consulta para ver si el lugar existe
        $result = $this->consultarLugar($ip);

        /*La primera vez que he insertado un nuevo lugar me ha puesto un error de que num_row es nulo por lo que tambien
        tengo que verificar que es diferente de null en la condicion*/
        if($result !== null && $result->num_rows > 0){
            /*Si al hacer una consulta num_row es mayor que 0 significa que la consulta ha devuelto 1 o mas filas por lo que el lugar ya existe.
              y si intentas volver a insertarlo no te va a dar error por clave duplicada.*/
            $this->cerrarConexion();
            return false;
        }else{
            //Ahora que sé que el lugar no existe lo inserto en la tabla
            $sql = "INSERT INTO lugar(ip,lugar,descripcion) VALUES ('" . $ip . "','" . $lugar . "','" . $descripcion . "');";

            if ($this->conexion->query($sql)) {
                $this->cerrarConexion();
                return true;
            } else {
                $this->cerrarConexion();
                return false;
            }
        }

    }

    /*Borra un lugar determinado.*/
    function borrar($lugar)
    {
        $sql = "DELETE FROM lugar WHERE lugar='".$lugar."';";

        //Query si no es select devuelve true o false
        if ($this->conexion->query($sql)) {
            //Si se ha afectado 1 o mas columnas significa que la consulta se hizo correctamente
            if ($this->conexion->affected_rows > 0) {
                $this->cerrarConexion();
                return true;
            } else {
                $this->cerrarConexion();
                return false;
            }
        } else {
            $this->cerrarConexion();
            return false;
        }
    }

    //Modifica la descripcion de un lugar
    function modificar($ip, $descripcion)
    {
        $sql = "UPDATE lugar SET descripcion='" . $descripcion . "' where ip='" . $ip . "';";

        if ($this->conexion->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /*Devuelve el listado de lugares existentes*/
    function listado()
    {
        $sql = "SELECT * FROM lugar ORDER BY lugar ASC";

        $resultado = $this->conexion->query($sql);

        $this->cerrarConexion();
        return $resultado;
    }

    /*Hace una consulta de un lugar con una determinada ip*/
    function consultarLugar($ip)
    {
        $sql = "SELECT * FROM lugar where ip='" . $ip . "';";
        $resultado = $this->conexion->query($sql);

        return $resultado;
    }


    function cerrarConexion()
    {
        $this->conexion->close();
    }
}