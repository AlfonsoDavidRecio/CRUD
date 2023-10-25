<html>                    <!--Autor: Alfonso David Recio Calderon 19/10/2023-->
    <head>
        <title>Modificacion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>MODIFICACION DEL LUGAR</h1>
        <form action="#" method="post">
            <p>
                <label>IP del lugar para modificar:</label>
                <input type="text" name="ip">
            </p>
            <input type="submit">
        </form>
        <?php
            require_once "../claseLugar.php";

            if(isset($_POST["ip"])){
                $lugar = new claseLugar();

                $result = $lugar->consultarLugar($_POST["ip"]);

                //Muestro tabla
                echo "<h1>Datos Lugar</h1>";
                echo "<table style='border-collapse: collapse; text-align: center'><tr><th style='border: 1px solid black'>IP</th><th style='border: 1px solid black'>Lugar</th><th style='border: 1px solid black'>Descripcion</th></tr></tr>
                <tr><td style='border: 1px solid black'>".$result["ip"]."</td><td style='border: 1px solid black'>".$result["lugar"]."</td><td style='border: 1px solid black'>".$result["descripcion"]."</td></tr></table>";

                //Pregunto si quiere modificar la descripcion
                echo "<form action='modificacion.php' method='post'>
                <p>
                    <label>¿Deseas modificar la descripcion del lugar?</label>
                </p>
                <input type='hidden' name='ip' value='".$_POST["ip"]."'>
                <input type='submit'>
                </form>";
            }
        ?>
    </body>
</html>