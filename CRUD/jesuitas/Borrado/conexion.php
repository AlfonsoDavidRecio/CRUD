<?php
    require_once "../../clases/clasejesuita.php";

    $jesuita = new claseJesuita();

    $result = $jesuita->borrar($_POST["nombre"]);

    if ($result){
        echo "Borrado realizado con exito";
    }else{
        echo "Ha habido un error al eliminar el jesuita o el Jesuita no existe en la base de datos. Prueba otra vez o cambia el nombre del jesuita";
    }
