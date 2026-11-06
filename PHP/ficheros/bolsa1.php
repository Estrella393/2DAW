
<!--hacer una exception con trigger_error(creado) y otro con set_expection_handler(automatico)-->
<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
        <input type="submit" name="mostrar" value="Mostrar resultados">
    </form>

    <?php
    require "funciones.php";
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fichero = fopen("ibex35.txt", "r");//r de lectura
    if ($fichero) {
        ?>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido1</th>
                <th>Apellido2</th>
                <th>Fecha nacimiento</th>
                <th>Localidad</th>
            </tr>

            <?php $contFilas = 0;
            $linea = fgets($fichero);//Leemis la primera linea
        
            while ($linea !== false) {//o:while (($linea = fgets($fichero)) !== false) {
        
                // Separar los datos de cada alumno
                $datos = explode("##",$linea);
                ?>

                <tr>
                    <td><?php echo $datos[0]; ?></td>
                    <td><?php echo $datos[1]; ?></td>
                    <td><?php echo $datos[2]; ?></td>
                    <td><?php echo $datos[3]; ?></td>
                    <td><?php echo $datos[4]; ?></td>
                </tr>

                <?php
                $contFilas++;
                $linea = fgets($fichero);
            }





            ?>


        </table>
        <?php echo "Se han leido " . $contFilas . " filas";

        fclose($fichero);

    } else {
       trigger_error("No existe o no se ha podido abrir el fichero");
    }

}

    ?>

</BODY>

</HTML>