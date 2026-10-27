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
		$n2 = limpiar($_POST["n2"]);
		$operador = limpiar($_POST["operacion"]);

		switch ($operador) {//no puedde ir antes de recoger el dato
			case "Suma":
				$simbolo = "+";//lo pilla como texto asique no me deja realizar la operacion directamente
				$operacion = $n1 + $n2;
				break;
			case "Resta":
				$simbolo = "-";
				$operacion = $n1 - $n2;
				break;
			case "Producto":
				$simbolo = "*";
				$operacion = $n1 * $n2;
				break;
			case "División":
				$simbolo = "/";
				$operacion = $n1 / $n2;
				break;
		}
		$resultado = $n1 . " " . $simbolo . " " . $n2 . " = ";//para escribir puedo concatenar con , pero para variables solo con .
	
	}
	?>

	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
		<div class="recuadro">
			<h1>CALCULADORA</h1>
			<div class="resultado arriba">
				<h3>Resultado de la operación:</h3>
				<div class="numeros">
					<?php echo $resultado; ?> <strong><?php echo $operacion; ?></strong>
				</div>	
			</div>
		</div>
	<?php endif; ?>

	<form name='calculadora' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
		<h1>CALCULADORA</h1>
		<strong>Operando 1:</strong><br>
		<input type='number' name='n1' value=''><br>

		<strong>Operando 2:</strong><br>
		<input type='number' name='n2' value=''><br>

		<strong>Selecciona operacion :</strong><BR>
		<input type='radio' checked name='operacion' value='Suma'>Suma</br>
		<input type='radio' name='operacion' value='Resta'>Resta</br>
		<input type='radio' name='operacion' value='Producto'>Producto</br>
		<input type='radio' name='operacion' value='División'>División</br>

		<input type="submit" value="Enviar">
		<input type="reset" value="Borrar">

		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
			<div class="resultado abajo">
				<h3>Resultado:</h3>
				<div class="numeros">
				<?php echo $resultado; ?> <strong><?php echo $operacion; ?></strong>
				</div>
			</div>
		<?php endif; ?>



	</FORM>
</BODY>

</HTML>