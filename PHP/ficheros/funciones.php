<?php
function limpiar($dato)
{
	$dato = trim($dato);
	$dato = stripslashes($dato);
	$dato = htmlspecialchars($dato);
	return $dato;
}



function myException($exception) {
    echo "Excepción capturada: " . $exception->getMessage();
}

set_exception_handler("myException");
?>