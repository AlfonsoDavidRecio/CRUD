<html>                    <!--Autor: Alfonso David Recio Calderon 19/10/2023-->
    <head>
        <title>Modificacion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>MODIFICACION DE UN JESUITA</h1>
        <form action="#" method="post">
            <p>
                <label>idJesuita para modificar:</label>
                <input type="number" name="idJesuita">
            </p>
            <input type="submit">
        </form>
        <?php
            require_once "../../clases/clasejesuita.php";

            if(isset($_POST["idJesuita"])){
                $jesuita = new claseJesuita();

                $result = $jesuita->consultarJesuita($_POST["idJesuita"]);

                //Verifico si el jesuita que se intenta modificar es inexistente.
                if($result !== null && $result->num_rows > 0){
                    /*Jesuita existe*/
                    $fila = $result->fetch_array();
                    //Muestro tabla
                    echo "<h1>Datos Jesuita</h1>";
                    echo "<table style='border-collapse: collapse; text-align: center'><tr><th style='border: 1px solid black'>idJesuita</th><th style='border: 1px solid black'>Nombre Jesuita</th><th style='border: 1px solid black'>Firma</th></tr></tr>
                     <tr><td style='border: 1px solid black'>".$fila["idJesuita"]."</td><td style='border: 1px solid black'>".$fila["nombre"]."</td><td style='border: 1px solid black'>".$fila["firma"]."</td></tr></table>";

                    //Pregunto si quiere modificar el jesuita
                    echo "<form action='modificacion.php' method='post'>
                        <p>
                           <label>¿Deseas modificar la firma del jesuita?</label>
                        </p>
                        <input type='hidden' name='idJesuita' value='".$_POST["idJesuita"]."'>
                        <input type='submit'>
                    </form>";

                }else{
                    /*Jesuita no existe*/
                    echo "El jesuita con esa identificacion no existe";
                }

            }
        ?>
    </body>
</html>