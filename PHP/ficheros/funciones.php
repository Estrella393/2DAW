<?php
function limpiar($dato)
{
	$dato = trim($dato);
	$dato = stripslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;
}



function myException($exception) {
    echo "Excepción capturada: " . $exception->getMessage();//coje el mensaje de throw new exception
}

set_exception_handler("myException");


function formatoEspañol($numero){
	return (float)str_replace(',', '.', str_replace('.', '', $numero));
}
?>