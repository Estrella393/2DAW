
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

/*crear el array cartas, que esa enlazado con las imagenes, 
 A vale 1
 J,Q,K valen 0.5*/

function crearBaraja(){
    $palos=["C","D","P","T"];
    $valores= [
        "1" => 1,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "J" => 0.5,
        "K" => 0.5,
        "Q" => 0.5
    ];

    $baraja=[];
    foreach ($valores as $carta=>$valor){
        foreach ($palos as $palo){
            $nombre=$carta.$palo. ".PNG";//$nombre = sprintf("%s%s.PNG", "1", "C");
            $baraja[$nombre]=$valor;//no empiezo directamete desde i=1 pq se saltaria la primera posicion
        }
    }
    return $baraja;
} 

//puedo hacer esto pero prefiero hacer dos funciones separadas
function repartirAntiguo($variableBaraja, $numCartas){
    //shuffle($variableBaraja); shuffle renombra los indices y quitaria la clave 
    $nombre=array_keys($variableBaraja);//array_keys devuelve todas las keys, o recorreo con buble y lurgo con key()
    shuffle($nombre);
    $suma=0;
    $repartidas=[];//para no perder las cartas que se reparten
    for ($i=0; $i<$numCartas; $i++){
        $elegida=array_pop($nombre);//elimina una y devuleve su valor
        $suma=$suma + $variableBaraja[$elegida];
        $repartidas[$elegida]=$variableBaraja[$elegida];

    }
    // NO SE PUEDE HACER:return $repartidas, $suma;
    return [
        "repartidas" => $repartidas,
        "suma" => $suma
    ];
}


function repartir($variableBaraja, $numCartas){
    //shuffle($variableBaraja); shuffle renombra los indices y quitaria la clave 
    $nombre=array_keys($variableBaraja);//array_keys devuelve todas las keys, o recorreo con buble y lurgo con key()
    shuffle($nombre);
    $repartidas=[];//para no perder las cartas que se reparten
    for ($i=0; $i<$numCartas; $i++){
        $elegida=array_pop($nombre);
        $repartidas[$elegida]=$variableBaraja[$elegida];
    }
    return  $repartidas;
}



function calcularPuntuacion($repartidas){
    
    $suma=0;
    foreach   ($repartidas as $repartida){//repartida es un array asocitativo, asique $repartida me devuleve el valor
    //o foreach ($repartidas as $repartida=>$valor){ y acceder con $valor  
        $suma=$suma + $repartida;
    }
    return $suma;
}












?>
