<?php
    $conexion =  new mysqli('localhost', "root", "", 'visitasjesuitas');

    $idJesuita = $_POST['idJesuita'];
    $firmaJesuita = $_POST['firma'];

    $sql= "UPDATE jesuita SET firma='".$firmaJesuita."' where idJesuita='".$idJesuita."';";

    //Query si no es select devuelve true o false
    if ($conexion ->query($sql)){
        echo "Fila modificada con exito";
    }else{
        echo "Hay un error en la modificacion";
    }
