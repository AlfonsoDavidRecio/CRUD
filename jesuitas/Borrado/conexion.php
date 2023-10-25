<?php
    require_once "../claseJesuita.php";

    $jesuita = new claseJesuita();

    $result = $jesuita->borrar($_POST["nombre"]);

    if ($result){
        echo "Borrado realizado con exito";
    }else{
        echo "Hay un error en el borrado";
    }
