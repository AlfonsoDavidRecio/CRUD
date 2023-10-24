<?php
    $conexion =  new mysqli('localhost', "root", "", 'visitasjesuitas');

    $idJesuita = $_POST['idJesuita'];
    $nombreJesuita = $_POST['nombre'];
    $firmaJesuita = $_POST['firma'];

    $sql= "INSERT INTO jesuita(idjesuita,nombre,firma) VALUES ('".$idJesuita."','".$nombreJesuita."','".$firmaJesuita."');";

    //Query si no es select devuelve true o false
    if ($conexion ->query($sql)){
        echo "Inserccion realizada con exito";
    }else{
        echo "Hay un error en la Inserccion";
    }
