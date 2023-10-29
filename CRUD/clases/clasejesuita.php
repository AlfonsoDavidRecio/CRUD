<?php

//Clase creada para la tabla jesuita
class  claseJesuita{
    private $conexion;

    //Constructor de la clase
    function __construct()
    {
        //require '../configuracion/config.php';
        require '/xampp/htdocs/2DAW/DWS/POO/Proyecto/configuracion/configLocalhost.php';

        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    //Añade un jesuita a la base de datos
    function anhadir($idJesuita, $nombreJesuita, $firmaJesuita)
    {
        //Primero hago una consulta para ver si el jesuita existe
        $result = $this->consultarJesuita($idJesuita);

        /*La primera vez que he insertado un nuevo jesuita me ha puesto un error de que num_row es nulo por lo que tambien
        tengo que verificar que es diferente de null en la condicion*/
        if($result !== null && $result->num_rows > 0){
            /*Si al hacer una consulta num_row es mayor que 0 significa que la consulta ha devuelto 1 o mas filas por lo que el jesuita ya existe.
              y si intentas volver a insertarlo no te va a dejar por clave duplicada.*/
            $this->cerrarConexion();
            return false;
        }else{
            //Ahora que se que el jesuita no existe lo inserto en la tabla
            $sql = "INSERT INTO jesuita(idjesuita,nombre,firma) VALUES ('" . $idJesuita . "','" . $nombreJesuita . "','" . $firmaJesuita . "');";

            if ($this->conexion->query($sql)) {
                echo "A";
                $this->cerrarConexion();
                return true;
            } else {
                $this->cerrarConexion();
                return false;
            }
        }
    }

    //Borra un jesuita en concreto.
    function borrar($nombreJesuita)
    {
        $sql = "DELETE FROM jesuita WHERE nombre='".$nombreJesuita."';";

        //Query si no es select devuelve true o false
        if ($this->conexion->query($sql)) {
            /*Si se ha afectado 1 o mas columnas significa que la consulta se hizo correctamente
              Devuelve true si se ha realizado la consulta, false en caso contrario.
            */
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

    //Devuelve el listado de jesuitas existentes
    function listado()
    {
        $sql = "SELECT * FROM jesuita ORDER BY nombre ASC";

        $resultado = $this->conexion->query($sql);

        $this->cerrarConexion();
        return $resultado;
    }

    //Hace una consulta de un jesuita con un determinado id
    function consultarJesuita($id)
    {
        $sql = "SELECT * FROM jesuita where idJesuita='" . $id . "';";
        $resultado = $this->conexion->query($sql);

        return $resultado;
    }

    //Cierra la conexion
    function cerrarConexion()
    {
        $this->conexion->close();
    }
}