<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>
     <form method="post" action="">
        <input type="submit" name="mostrar" value="Mostrar resultados">
    </form>

    <?php
    require "funciones.php";
    /*fopen("nombre_archivo.txt", "modo"); */

    /*coger datos:
     fgets():Leer una línea.
    fgetc():Leer un carácter.

    ESTA FUNCIONES NO NECESITAN FOPEN
    file_get_contents():Leer todo el archivo. 
    file():Leer todo el archivo en un array de líneas.*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {//isset() comprueba si existe un campo concreto :if (isset($_POST["mostrar"])) {

    $fichero = fopen("alumnos1.txt", "r");//r de lectura
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
                $datos = preg_split('/\s+/', $linea);//epreg_split igual que explode pero permite utilizar patrones para buscar separadores
                //  \s+ significa: uno o más espacios en blanco consecutivos.
                //\s{2,} dos o más veces(para nombres compuestos) pero no vale pq no sobra mas de un espacio en la fecha
                /*opcion si se cauntos espacios hay:
                $nombre = trim(substr($linea, 0, 40));  empiezo por 0, cojo 40
                $ape1 = trim(substr($linea, 41, 41));
                $ape2 = trim(substr($linea, 83, 42));
                $fecha = trim(substr($linea, 126, 10));
                $localidad = trim(substr($linea, 137, 27));
                 */
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
        print ("No existe o no se ha podido abrir el fichero");
    }
  
}    



    ?>

</BODY>

</HTML>