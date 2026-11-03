<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE></HEAD> 
<BODY> 

<?php
require "funciones.php";
/*fopen("nombre_archivo.txt", "modo"); */

/*coger datos:
 fgets():Leer una línea.
fgetc():Leer un carácter.

ESTA FUNCIONES NO NECESITAN FOPEN
file_get_contents():Leer todo el archivo. 
file():Leer todo el archivo en un array de líneas.*/

$fichero = fopen("alumnos1.txt", "r");//r de lectura
if ($fichero){
    ?>

    <table> 
        <tr>
            <th>Nombre</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
            <th>Fecha nacimiento</th>
            <th>Localidad</th>
        </tr>

        <?php $contFilas=0;?>
        <tr>

        </tr>

    </table>

    <?php
    fclose($fichero)

} else {
    echo "No existe o no se ha podido abrir el fichero"
}



?>

</BODY> 
</HTML> 