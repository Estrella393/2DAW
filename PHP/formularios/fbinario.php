
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
		
		$resultado = sprintf('%08b', $n1);
	
	}
	?>

	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
		<div class="recuadro">
			<h1>CONVERSOR BINARIO</h1>
			<div class="resultado arriba">
				<h3>Resultado de la conversión:</h3>
				<div class="numeros">
					Número Decimal: <?php echo $n1; ?><br>
                    Número Binario: <?php echo $resultado; ?>
				</div>	
			</div>
		</div>
	<?php endif; ?><!--o ":" y "endif;" o con php puro con corcheres y un echo-->

	<form name='binario' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
		<h1>CONVERSOR BINARIO</h1>
		<strong>Número Decimal:</strong><br>
		<input type='number' name='n1' value=''><br>

		<input type="submit" value="Enviar">
		<input type="reset" value="Borrar">

		<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $resultado != ""): ?>
			<div class="resultado abajo">
				<h3>Resultado de la conversión:</h3>
				<div class="numeros">
					Número Decimal: <?php echo $n1; ?><br>
                    Número Binario: <?php echo $resultado; ?>
				</div>	
			</div>
		<?php endif; ?>



	</FORM>
</BODY>

</HTML>