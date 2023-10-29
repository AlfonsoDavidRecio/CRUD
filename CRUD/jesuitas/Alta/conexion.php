<?php
    require_once "../../clases/clasejesuita.php";

    $jesuita = new claseJesuita();

    $result = $jesuita->anhadir($_POST["idJesuita"],$_POST["nombre"],$_POST["firma"]);

    if ($result){
        echo "Inserccion realizada con exito";
    }else{
        echo "Hay un error en la Inserccion o el Jesuita ya existe.";
    }
