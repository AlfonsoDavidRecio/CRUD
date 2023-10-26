<?php
    require_once "../../clases/clasejesuita.php";

    $jesuita = new claseJesuita();

    $result = $jesuita->borrar($_POST["nombre"]);

    if ($result){
        echo "Borrado realizado con exito";
    }else{
        echo "Hay un error en el borrado";
    }
