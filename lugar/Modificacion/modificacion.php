<html>                    <!--Autor: Alfonso David Recio Calderon 19/10/2023-->
    <head>
        <title>Modificacion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>MODIFICACION DEL LUGAR</h1>
        <form action="#" method="post">
            <p>
                <label>Nueva descripcion:</label>
                <input type="text" name="descripcion">
            </p>
            <input type='hidden' name="ip" value='<?php echo $_POST['ip']; ?>'>
            <input type="submit">
        </form>
        <?php
            require_once "../claseLugar.php";

            if(isset($_POST["descripcion"])){
                $lugar = new claseLugar();

                $mod = $lugar->modificar($_POST["ip"],$_POST["descripcion"]);

                if ($mod){
                    $result = $lugar->consultarLugar($_POST["ip"]);

                    echo "<h1>Nuevos datos del Lugar</h1>";

                    echo "<table style='border-collapse: collapse; text-align: center'><tr><th style='border: 1px solid black'>IP</th><th style='border: 1px solid black'>Lugar</th><th style='border: 1px solid black'>Descripcion</th></tr></tr>
                            <tr><td style='border: 1px solid black'>".$result["ip"]."</td><td style='border: 1px solid black'>".$result["lugar"]."</td><td style='border: 1px solid black'>".$result["descripcion"]."</td></tr></table>";

                    $lugar->cerrarConexion();
                }else{
                    echo 'Hay un error en la modificacion.';
                }

            }
        ?>
    </body>
</html>