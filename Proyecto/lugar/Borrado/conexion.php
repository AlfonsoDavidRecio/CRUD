<?php
    require_once "../../clases/claselugar.php";

    $lugar = new claseLugar();

    $result = $lugar->borrar($_POST["lugar"]);

    if ($result){
        echo "Borrado realizado con exito";
    }else{
        echo "Hay un error en el borrado";
    }
