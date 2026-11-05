
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
    $ruta = $_POST["ruta"];
    $operacion = $_POST["operacion"];
    $numLinea = $_POST["numLinea"];
    $numLineas=$_POST["numLineas"];
    $fichero = fopen($ruta, "r");//r de lectura
    $cont=1;

    if ($fichero) {
       
            if ($operacion == "todo") {
                while (($linea = fgets($fichero)) !== false) {
                    echo $linea . "<br>";
                }
            }



            elseif ($operacion == "linea") {
                while (($linea = fgets($fichero)) !== false) {
                    if ($cont == $numLinea) {
                        echo $linea;
                        break;
                    }
                $cont++;
                }
            }

            elseif ($operacion == "lineas") {
                while (($linea = fgets($fichero)) !== false && $cont <= $numLineas) {
                echo $linea . "<br>";
                $cont++;
            }

                /*while (($linea = fgets($fichero)) !== false) { ERROR:el while sigue mostrando todas las lineas
                    if ($cont <= $numLineas) {
                    echo $linea . "<br>";
                }
                $cont++;
                }*/
            }





        fclose($fichero);

    } else {
        print ("No existe o no se ha podido abrir el fichero");
    }
  
}    



    ?>

    <form name='fichero' method='post'  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		<h1>fichero5.php</h1>
		<strong>Ruta:</strong><br>
        <input type="text" name="ruta" required><br>
        
		<strong>Operaciones:</strong><br>
        <input type='radio' name='operacion' value='todo'>Mostrar fichero</br>
        <input type='radio' name='operacion' value='linea'>Mostrar linea</br>
        <input type="number" name="numLinea" min="1"><br>
        <input type='radio' name='operacion' value='lineas'>Mostrar N primeras lineas</br>
        <input type="number" name="numLineas" min="1"><br>

		<input type="submit" value="Mostrar">
		<input type="reset" value="Limpiar">


	</FORM>

</BODY>

</HTML>