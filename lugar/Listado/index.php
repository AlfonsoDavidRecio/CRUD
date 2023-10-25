<?php
    require_once "../claseLugar.php";

    $lugar = new claseLugar();

    $resultado = $lugar->listado();

    echo "<table><tr><th style='border: 1px solid black'>IP</th><th style='border: 1px solid black'>Lugar</th><th style='border: 1px solid black'>Descripcion</th></tr></tr>";
    while($fila = $resultado ->fetch_array()){
        echo "<tr><td style='border: 1px solid black'>".$fila["ip"]."</td><td style='border: 1px solid black'>".$fila["lugar"]."</td><td style='border: 1px solid black'>".$fila["descripcion"]."</td></tr>"; //ip, lugar y descripcion
    }
    echo "</table>";
