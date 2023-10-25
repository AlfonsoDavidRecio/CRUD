<html>                    <!--Autor: Alfonso David Recio Calderon 19/10/2023-->
    <head>
        <title>Modificacion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>MODIFICACION</h1>
        <form action="#" method="post">
            <p>
                <label>idJesuita para modificar:</label>
                <input type="number" name="idJesuita">
            </p>
            <input type="submit">
        </form>
        <?php
            require_once "../claseJesuita.php";

            if(isset($_POST["idJesuita"])){
                $jesuita = new claseJesuita();

                $result = $jesuita->consultarJesuita($_POST["idJesuita"]);

                //Muestro tabla
                echo "<h1>Datos Jesuita</h1>";
                echo "<table style='border-collapse: collapse; text-align: center'><tr><th style='border: 1px solid black'>idJesuita</th><th style='border: 1px solid black'>Nombre Jesuita</th><th style='border: 1px solid black'>Firma</th></tr></tr>
                     <tr><td style='border: 1px solid black'>".$result["idJesuita"]."</td><td style='border: 1px solid black'>".$result["nombre"]."</td><td style='border: 1px solid black'>".$result["firma"]."</td></tr></table>";

                //Pregunto si quiere modificar el jesuita
                echo "<form action='modificacion.php' method='post'>
                    <p>
                       <label>¿Deseas modificar la firma del jesuita?</label>
                    </p>
                    <input type='hidden' name='idJesuita' value='".$_POST["idJesuita"]."'>
                    <input type='submit'>
                </form>";
            }
        ?>
    </body>
</html>