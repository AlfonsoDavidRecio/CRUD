<?php
    require_once "../claseLugar.php";

    $jesuita = new claseLugar();

    $result = $jesuita->anhadir($_POST["ip"],$_POST["lugar"],$_POST["descripcion"]);

    if ($result){
        echo "Inserccion realizada con exito";
    }else{
        echo "Hay un error en la Inserccion";
    }
