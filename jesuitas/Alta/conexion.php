<?php
    require_once "../claseJesuita.php";

    $jesuita = new claseJesuita();

    $result = $jesuita->anhadir($_POST["idJesuita"],$_POST["nombre"],$_POST["firma"]);

    if ($result){
        echo "Inserccion realizada con exito";
    }else{
        echo "Hay un error en la Inserccion";
    }
