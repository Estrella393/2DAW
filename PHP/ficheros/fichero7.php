


<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>
    
    <?php
    /* 
    copy($origen, $destino)
    rename("nuevoNombre", $destino)
    unlink($origen)
    dirname coje ruta solo de carpeta
    is_dir
    */
  
    require "funciones.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ruta = $_POST["ruta"];
            $rutaFinal = $_POST["rutaFinal"];
            $operacion = $_POST["operacion"];

            //$fichero = fopen($ruta, "r");
            /*NO ES NECESARIO para estas operaciones */
   
            if (file_exists($ruta)&& is_file($ruta)) {/*file_exists($ruta) comprueba si existe esa ruta.
is_file($ruta) comprueba si existe y además es un fichero, no una carpeta. */
                
                print("Datos del fichero <br>");
                echo "<br>";
                if ($operacion=="copiar"){
                    $carpeta = dirname($rutaFinal);//quta el nombre del fichero de la ruta, asi puedo comprobar solo la carpeta
                        if (!is_dir($carpeta)) {//si no existe, se crea
                            mkdir($carpeta);
                            //mkdir($carpeta, 0777, true); true permite crear carpetas intermedias 0777 r w y ejecutar
                            /*0777	Todos pueden leer, escribir y ejecutar.
                            0755	El propietario puede hacer todo; los demás pueden leer y ejecutar.
                            0700	Solo el propietario puede acceder.
                            0770	Propietario y grupo pueden hacer todo.
                            0644	Propietario puede leer y escribir; los demás solo leer. */
                        }
                        copy($ruta,$rutaFinal);
                }

                elseif ($operacion=="renombrar"){
                    $carpeta = dirname($rutaFinal);
                        if (!is_dir($carpeta)) {
                            mkdir($carpeta);
                        }
                        rename($ruta, $rutaFinal);//porque el la ruta final tambien pondria el numero nombre 
                }
                else{
                    unlink($ruta);
                }

                
            } else {
                print ("No existe o no se ha podido abrir el fichero");
        }
  
    }    



    ?>

    <form name='fichero' method='post'  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		<h1>fichero7.php</h1>
		<strong>Fichero Origen (Ruta/nombre):</strong><br>
        <input type="text" name="ruta" required><br>

        <strong>Fichero Destino (Ruta/nombre):</strong><br>
        <input type="text" name="rutaFinal" ><br><!--quiro requiered pq en borrar no hace falta-->

        <strong>Operaciones:</strong><br>
        <input type='radio' name='operacion' value='copiar'>Copiar fichero</br>
        <input type='radio' name='operacion' value='renombrar'>Renombrar fichero</br>
        <input type='radio' name='operacion' value='borrar'>Borrar fichero</br>
        
	
		<input type="submit" value="Mostrar">
		<input type="reset" value="Limpiar">


	</FORM>

</BODY>

</HTML>