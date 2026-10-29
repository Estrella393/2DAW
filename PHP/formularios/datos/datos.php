
<HTML>

<HEAD>
	<TITLE> FORMULARIO BASE </TITLE>
	<link rel="stylesheet" href="..\style.css">

</HEAD>

<BODY>

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
	$email = limpiar($_POST["email"]);
	$sexo = limpiar($_POST["sexo"]);

	if ($nombre != "" && $email != "") {//solo nombre y email son obligatorios

		$resultado = "
                <table>
                    <tr>
						<th>Campo</th>
                        <th>Valor</th>
                    </tr>
                    <tr>
						<th>Nombre</th>
                        <td>$nombre</td>
                    </tr>
					<tr>
						<th>Apellido1</th>
						<td>$ape1</td>
					</tr>	
					<tr>
						<th>Apellido2</th>
						<td>$ape2</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>$email</td>
					</tr>
					<tr>
						<th>Sexo</th>
						<td>$sexo</td>
					</tr>
                </table>
            ";

		$datos = "$nombre;$ape1;$ape2;$email;$sexo".PHP_EOL;//no vale con poner br para saltar de linea
		file_put_contents("datos.txt", $datos, FILE_APPEND);
		/*Si el fichero filename no existe, será creado. De lo contrario, el fichero existente será sobrescrito,
		 a menos que la opción FILE_APPEND esté definida. */

	} else {
		$resultado = "Los datos no se han guardado correctamente";
	}
}
function mostrarResultado($resultado)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""):?>
        <h1>DATOS ALUMNOS</h1>
        <div class="resultado arriba">
            <h3>Datos guardados correctamente</h3>
            <div class="numeros">
                <?php echo $resultado; ?>
            </div>
        </div>
<?php
    endif;
}
?>

<?php mostrarResultado($resultado);?> 

<form name='conversor' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
	<h1>DATOS ALUMNOS</h1>
	<strong>Nombre:</strong><br>
	<input type="text" name="nombre" required><br>

	<strong>Apellido1:</strong><br>
	<input type="text" name="ape1"><br>

	<strong>Apellido2:</strong><br>
	<input type="text" name="ape2"><br>

	<strong>Email:</strong><br>
	<input type="text" name="email" required><br>

	<strong>Sexo</strong><BR>
	<input type='radio' checked name='sexo' value='Mujer'>Mujer
	<input type='radio' name='sexo' value='Hombre'>Hombre</br>

	<input type="submit" value="Enviar">
	<input type="reset" value="Borrar">

	<?php mostrarResultado($resultado);?> 


</FORM>
</BODY>

</HTML>