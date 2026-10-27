
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
		$n1 = limpiar($_POST["n1"]);//deberia validar si es un numero
        /*$n1 = filter_var($_POST['n1'] ?? '', FILTER_VALIDATE_INT);

if ($n1 === false) {
    echo "Introduce un entero válido";
} */
		$operador = limpiar($_POST["operacion"]);

		switch ($operador) {
            case "Binario":
            $resultado = sprintf('Número binario: %08b', $n1);
            break;

        case "Octal":
            $resultado = sprintf('Número octal: %o', $n1);
            break;

        case "Hexadecimal":
            $resultado = sprintf('Número hexadecimal: %X', $n1);
            break;

        case "Todos sistemas":
            $resultado = sprintf(
            'Número decimal: %d <br> Número binario: %08b <br>  Número octal: %o <br> 
             Número hexadecimal: %X',
            $n1, $n1, $n1, $n1
            );
            break;
        }
		
	
	}
	?>

	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
		<div class="recuadro">
			<h1>CONVERSOR NUMERICO</h1>
			<div class="resultado arriba">
				<h3>Resultado de la conversión:</h3>
				<div class="numeros">
					<?php echo $resultado; ?> 
				</div>	
			</div>
		</div>
	<?php endif; ?>

	<form name='conversor' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
		<h1>CONVERSOR NUMERICO</h1>
		<strong>Número decimal:</strong><br>
		<input type='number' name='n1' value=''><br>

		<strong>Convertir a:</strong><BR>
		<input type='radio' checked name='operacion' value='Binario'>Binario</br>
		<input type='radio' name='operacion' value='Octal'>Octal</br>
		<input type='radio' name='operacion' value='Hexadecimal'>Hexadecimal</br>
		<input type='radio' name='operacion' value='Todos sistemas'>Todos sistemas</br>

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