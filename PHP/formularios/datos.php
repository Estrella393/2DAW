

<HTML>

<HEAD>
	<TITLE> FORMULARIO BASE </TITLE>
    <link rel="stylesheet" href="style.css">

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
		$n1 = limpiar($_POST["n1"]);
		
	
	}
	?>

	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
		<div class="recuadro">
			<h1>DATOS ALUMNOS</h1>
			<div class="resultado arriba">
				<h3>Resultado de la conversión:</h3>
				<div class="numeros">
					<?php echo $resultado; ?> 
				</div>	
			</div>
		</div>
	<?php endif; ?>

	<form name='conversor' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
		<h1>DATOS ALUMNOS</h1>
		<strong>Nombre:</strong><br>
        <input type="text" name="nombre" required><br>

		<strong>Apellido1:</strong><br>
        <input type="text" name="ape1" ><br>

        <strong>Apellido2:</strong><br>
        <input type="text" name="ape2"><br>

        <strong>Email:</strong><br>
        <input type="text" name="email" required><br>

        <strong>Sexo</strong><BR>
		<input type='radio' checked name='sexo' value='Mujer'>Mujer
		<input type='radio' name='sexo' value='Hombre'>Hombre</br>

		<input type="submit" value="Enviar">
		<input type="reset" value="Borrar">

		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
			<h1>CONVERSOR NUMERICO</h1>
			<div class="resultado arriba">
				<h3>Resultado de la conversión:</h3>
				<div class="numeros">
					<?php echo $resultado; ?> 
				</div>	
			</div>
		<?php endif; ?>



	</FORM>
</BODY>

</HTML>