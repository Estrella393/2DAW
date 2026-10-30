
<?php
require "funciones.php";
$resultado = "";//mirar funciones empty, etc


//Solo ejecutar si pulsamos SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = limpiar($_POST["nombre"]);
	$ape1 = limpiar($_POST["ape1"]);
	$ape2 = limpiar($_POST["ape2"]);
	$fecha = limpiar($_POST["fecha"]);
	$localidad = limpiar($_POST["localidad"]);

	if ($nombre != "" && $ape1 != ""&& $ape2 != "" && $fecha != "" && $localidad != "") {

        $datos = [$nombre, $ape1, $ape2, $fecha, $localidad];
        $cadena = "";
        $i = 0;
        foreach ($datos as $valor) {
        $cadena = $cadena . $valor;//igual a $cadena .= $valor;

        if ($i < count($datos) - 1) {
            $cadena = $cadena . "##";
            }
         $i++;
        }
		
        
       //o: $cadena = implode("##", $array);
       //o:$datos = "$nombre##$ape1##$ape2##$fecha##$localidad".PHP_EOL;
      

		file_put_contents("alumnos2.txt", $cadena. PHP_EOL, FILE_APPEND);
		$resultado = "Los datos se han guardado correctamente";
		echo $resultado;
        }
}?>



<HTML>
<HEAD>
	<TITLE> FORMULARIO BASE </TITLE>

</HEAD>

<BODY>

	<form name='fichero' method='post'  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
		<h1>fichero2.php</h1>
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
		