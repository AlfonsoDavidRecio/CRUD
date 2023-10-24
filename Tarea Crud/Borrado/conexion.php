<?php
    $conexion =  new mysqli('localhost', "root", "", 'visitasjesuitas');

    $nombreJesuita = $_POST['nombre'];

    $sql= "DELETE FROM jesuita WHERE nombre='".$nombreJesuita."';";

    //Query si no es select devuelve true o false
    if ($conexion ->query($sql)){
        echo "Borrado realizado con exito";
    }else{
        echo "Hay un error en el borrado";
    }
