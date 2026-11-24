
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



function crearBaraja(){
    $cartas["1","J","K","Q"]
    $palos=["C","D","P","T"];
    

    $baraja=[];
    foreach ($cartas as $carta){
        foreach ($palos as $palo){
            for ($i=1;$i<=2;$i++){
                $nombre=$carta.$palo.$i. ".PNG";//$nombre = sprintf("%s%s.PNG", "1", "C");
            }
        }
    }
    return $baraja;
} 




?>