<html>                    <!--Autor: Alfonso David Recio Calderon 19/10/2023-->
    <head>
        <title>Modificacion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>MODIFICACION DE UN JESUITA</h1>
        <form action="#" method="post">
            <p>
                <label>Nueva firma:</label>
                <input type="text" name="firma">
            </p>
            <input type='hidden' name="idJesuita" value='<?php echo $_POST['idJesuita']; ?>'>
            <input type="submit">
        </form>
        <?php
            require_once "../../clases/clasejesuita.php";

            if(isset($_POST["firma"])){
                $jesuita = new claseJesuita();

                $mod = $jesuita->modificar($_POST["idJesuita"],$_POST["firma"]);

                if ($mod){
                    $result = $jesuita->consultarJesuita($_POST["idJesuita"]);

                    echo "<h1>Nuevos datos del Jesuita</h1>";
                    echo "<table style='border-collapse: collapse; text-align: center'><tr><th style='border: 1px solid black'>idJesuita</th><th style='border: 1px solid black'>Nombre Jesuita</th><th style='border: 1px solid black'>Firma</th></tr></tr>
                        <tr><td style='border: 1px solid black'>".$result["idJesuita"]."</td><td style='border: 1px solid black'>".$result["nombre"]."</td><td style='border: 1px solid black'>".$result["firma"]."</td></tr></table>";

                    $jesuita->cerrarConexion();
                }else{
                    echo 'Hay un error en la modificacion.';
                }

            }
        ?>
    </body>
</html>