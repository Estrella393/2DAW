

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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ruta = $_POST["ruta"];
   

    if ($fichero) {
       


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