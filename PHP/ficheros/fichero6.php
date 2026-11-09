

<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>
    
    <?php
    /* Nombre	basename($ruta)
Ruta completa	realpath($ruta)
Tamaño	filesize($ruta)
Último acceso	fileatime($ruta)
Última modificación	filemtime($ruta)
Tipo/extensión	pathinfo($ruta, PATHINFO_EXTENSION)

tambien esta 
$datos = stat($ruta);
$datos['size']
date("d/m/Y", $datos['atime'])
date("d/m/Y", $datos['mtime']) 
*/
    require "funciones.php";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ruta = $_POST["ruta"];

            $fichero = fopen($ruta, "r");
            /*$fichero NO guarda el nombre ni el contenido del fichero. 
            Guarda una referencia que PHP utiliza para identificar el fichero que has abierto. */
   
            if ($fichero) {//file_exists($ruta) && is_file($ruta)
                
                print("Datos del fichero <br>");
                echo "<br>";
                echo "Nombre: ".basename($ruta). "<br>";
                echo "Ruta: ".realpath($ruta). "<br>";
                echo "Tamaño: ".filesize($ruta). "<br>" ;
                echo "Último acceso:: ".fileatime($ruta). "<br>" ;
                echo "Último modificación: ".filemtime($ruta). "<br>" ;
                echo "Tipo: ".pathinfo($ruta, PATHINFO_EXTENSION). "<br>" ;

                fclose($fichero);
                
            } else {
                print ("No existe o no se ha podido abrir el fichero");
        }
  
    }    



    ?>

    <form name='fichero' method='post'  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		<h1>fichero6.php</h1>
		<strong>Ruta:</strong><br>
        <input type="text" name="ruta" required><br>
        
	
		<input type="submit" value="Mostrar">
		<input type="reset" value="Limpiar">


	</FORM>

</BODY>

</HTML>