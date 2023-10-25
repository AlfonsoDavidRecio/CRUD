<?php
    require_once "../claseJesuita.php";

    $jesuita = new claseJesuita();

    $resultado = $jesuita->listado();

    echo "<table><tr><th style='border: 1px solid black'>Nombre Jesuita</th><th style='border: 1px solid black'>Firma</th></tr></tr>";
    while($fila = $resultado ->fetch_array()){
        echo "<tr><td style='border: 1px solid black'>".$fila["nombre"]."</td><td style='border: 1px solid black'>".$fila["firma"]."</td></tr>"; //nombre y firmas jesuitas
    }
    echo "</table>";
