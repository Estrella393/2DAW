
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

/*
ganadores:
gana quien mas se acerque, se reparte un 50% entre los ganadores
si alguien saca 7.5 se lleva un 80%
 */
function calcularPremio($suma, $apuesta){//suma se refiere a puntuacion
$premio=0;//0 y no "" para que si nade gane me devuleva eso
   
if ($suma==7.5){
    $premio=0.8*$apuesta;
    echo "Han ganado con ".$suma. " puntos y recibe ".$premio;
}
else if ($suma<7.5){
    $premio=0.5*$apuesta;
    echo "Han ganado con ".$suma. " puntos y recibe ".$premio;
}
else{
    echo "No hay ganadores: todos han superado los 7.5 puntos. El bote acumulado es de ".$apuesta;
}
return $premio; //para añadirlo al fichero
}


function generarIniciales($jugador){
    $separado =explode(" ",$jugador);//PRIMERO SEPARADOR
    return substr($separado[0],0,1).substr($separado[1],0,1);//no es necesariio sprintf pq no utilizaba marcadores
}

//utilizar file que crea un array con las filas de los ficheros
function generarFichero($jugador, $suma, $premio){
    $iniciales=generarIniciales($jugador);
    $datos=$iniciales."#".$suma."#".$premio."\n";//no es necesario $datos = sprintf("%s#%d#%s\n", $iniciales, $puntos, $premio);
    $ultimaFila=sprintf("TOTAL PREMIOS#");//aun no hay mas jugadores asquie no tengo nada que sumar
    //sacar fecha
    $fecha = date('dmYHis');// día mes año hora minutos segundos
    echo $fecha;
    file_put_contents("apuestas_".$fecha.".txt", $datos);//no pongo file append porque supongo que se crea uno en cada partida
}










?>
