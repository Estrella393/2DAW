<?php
$resultado = "";
function limpiar($dato)
{
	$dato = trim($dato);
	$dato = stripslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;
}

//Solo ejecutar si pulsamos SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = limpiar($_POST["nombre"]);
	$ape1 = limpiar($_POST["ape1"]);
	$ape2 = limpiar($_POST["ape2"]);
	$fecha = limpiar($_POST["fecha"]);
	$localidad = limpiar($_POST["localidad"]);

	if ($nombre != "" && $ape1 != ""&& $ape2 != "" && $fecha != "" && $localidad != "") {

    /*str_pad añade el valor que le digams hasta esa longitud
        otra opcion:
        $nombre = $nombre . str_repeat(" ", 37);
        o:
        while (strlen($nombre) < 40) {
        $nombre = $nombre . " ";
    }*/
        $nombre=str_pad($nombre, 40, " ");
        $ape1=str_pad($ape1, 41, " ");//cuento desde que termina la anterior
        $ape2=str_pad($ape2, 42, " ");
        $fecha=str_pad($fecha, 10, " ");
        $localidad=str_pad($localidad, 27, " ");


		$datos = "$nombre;$ape1;$ape2;$fecha;$localidad".PHP_EOL;//no vale con poner br para saltar de linea
		file_put_contents("datos.txt", $datos, FILE_APPEND);
		$resultado = "Los datos se han guardado correctamente";
		echo $resultado;

        
	/*} else {
		$resultado = "Los datos no se han guardado correctamente";
		echo $resultado;
	} no tiene sentido ya que la parte de html no de deja pasar si te falta algo*/
	}
}?>



<HTML>

<HEAD>
	<TITLE> FORMULARIO BASE </TITLE>

</HEAD>

<BODY>

	<form name='fichero' method='post' >
		<h1>fichero1.php</h1>
		<strong>Nombre:</strong><br>
        <input type="text" name="nombre" required><br>

		<strong>Apellido1:</strong><br>
        <input type="text" name="ape1" required ><br>

        <strong>Apellido2:</strong><br>
        <input type="text" name="ape2" required><br>

        <strong>Fecha de nacimiento</strong><br>
        <input type="date" name="fecha" required ><br>

        <strong>Localidad:</strong><br>
        <input type="text" name="localidad"  required><br>
        

		<input type="submit" value="Guardar alumno">
		<input type="reset" value="Limpiar">


	</FORM>
</BODY>

</HTML>