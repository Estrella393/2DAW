
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
/*function repartirAntiguo($variableBaraja, $numCartas){
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
}*/




function repartir($variableBaraja, $numCartas, $arrayJugadores){
    //shuffle($variableBaraja); shuffle renombra los indices y quitaria la clave 
    $nombre=array_keys($variableBaraja);//array_keys devuelve todas las keys, o recorreo con buble y lurgo con key()
    shuffle($nombre);
    $i=0;
    $arrayJugadoresCartas=[];
    foreach($arrayJugadores as $jugador){
        $i++;
        $repartidas=[];
        for ($j=0; $j<$numCartas; $j++){
            $elegida=array_pop($nombre);
            $repartidas[$elegida]=$variableBaraja[$elegida];
        }
        //lo pongo asi porque despues voy a añadir mas datos y es mucho mas claro
        $arrayJugadoresCartas['jugador'.$i]=[
            'cartas'=>$repartidas
            ];
        
        
        
        
        // ERROR $arrayJugadoresCartas=['jugador'.$i => $repartidas[]];//al hacer esto cada vez creo un nuevo array =[], por lo  tanto solo me devolveria el jugador 4
        //ademas, en todo caso seria repartidas, sin [] 
    
        //forma CORRECTA DE EL ERROR ANTIGUO $arrayJugadoresCartas['jugador'.$i] = $repartidas;
    /*IMPORTANTE
    =[] creo array
    []=asigno  */
    }
    return  $arrayJugadoresCartas;
}

/*$repartidas = [
    'cartas' => [
        '1' => 1,
        'K' => 0.5
    ]
]; */

function calcularPuntuacion($arrayJugadoresCartas){
    $arrayJugadoresCartasPuntuacion=[];
    foreach($arrayJugadoresCartas as $jugador=>$repartidas){//recorro jugasores
        $suma=0;
        foreach($repartidas['cartas'] as $carta=>$puntuacion){//recorro cartas:tengo que acceder con la clave ['cartas']
        //comentarios de cuando estaba con 1 jugador: repartida es un array asocitativo, asique $repartida me devuleve el valor
        //o foreach ($repartidas as $repartida=>$valor){ y acceder con $valor 
            $suma=$suma + $puntuacion;//CON FOREACH NO NECESITO CONTADOR
        }
        $arrayJugadoresCartasPuntuacion[$jugador]=[
            'cartas'=>$repartidas['cartas'],
            'puntuacion'=>$suma
        ];
   
    // ERROR ANTIGUO $arrayJugadoresCartasPuntuacion=['jugador'.$i => $repartidas[],$suma]; 
    //CORRECCION ANTIGUA: lo mismo que he añadido ahora "lo renombro" en esta funcion y me quedaria igual;   
    }
    return $arrayJugadoresCartasPuntuacion;
}


//buscar la mejor puntuacion de los 4
function mayorPuntuacion($arrayJugadoresCartasPuntuacion){
    $max=0;
    foreach ($arrayJugadoresCartasPuntuacion as $jugador => $datos) {//datos tiene todos lo arrays 
        if ($datos['puntuacion']==7.5) {
            $max=7.5;
        }
        else if ($datos['puntuacion']<7.5) {
            if ($datos['puntuacion']>$max) {//
                $max = $datos['puntuacion'];
            }
        }
    }
    return $max;
}



/*
ganadores:
gana quien mas se acerque, se reparte un 50% entre los ganadores
si alguien saca 7.5 se lleva un 80%
 */
function calcularPremio($arrayJugadoresCartasPuntuacion, $apuesta){//suma se refiere a puntuacion
<<<<<<< HEAD
$arrayCompleto=[];
$premioTotal=0;//0 y no "" para que si nade gane me devuleva eso
$contGanadores=0;
   
if ($suma==7.5){
=======
$premio=0;//0 y no "" para que si nade gane me devuleva eso
$max= mayorPuntuacion($arrayJugadoresCartasPuntuacion);
if ($max==7.5){
>>>>>>> 7e0bfe057178bcec5dfcedb86ca3dfbefc2bf897
    $premio=0.8*$apuesta;
}
else if ($max<7.5){
    $premio=0.5*$apuesta;
}//si no entra en ninguno de esos dos, no gana nadie y devulevo 0
return $premio; 
}
/*foreach ($arrayJugadoresCartasPuntuacion as $jugador){//o:as $jugador => $datos y acceder con $datos['puntuacion']
   foreach ($jugador['puntuacion'] as $puntuaciones) { */



function calcularPremioIndividual($arrayJugadoresCartasPuntuacion,$apuesta) {
$premioTotal=calcularPremio($arrayJugadoresCartasPuntuacion, $apuesta) ;   
$max= mayorPuntuacion($arrayJugadoresCartasPuntuacion);
$numGanadores = 0;
$premioIndividual = 0;
$arrayCompleto = [];
foreach ($arrayJugadoresCartasPuntuacion as $jugador){
    if ($jugador['puntuacion']==$max) {
        $numGanadores++;
    }
}
if ($numGanadores>0) {//sino, se queda como esta inicializada en 0
    $premioIndividual = $premioTotal/$numGanadores;
}
foreach ($arrayJugadoresCartasPuntuacion as $jugador => $datos) {
$premio = 0;
    if ($datos['puntuacion'] == $max) {
        $premio = $premioIndividual;
    }
    $arrayCompleto[$jugador] = [
        /*NO PUEDO HACER  $arrayCompleto[$jugador] si tengo oreach ($arrayJugadoresCartasPuntuacion as $jugador 
        porque eso es TODO el array, no cada jugador. En cambio si es la clave si puedo*/
        'cartas' => $datos['cartas'],
        'puntuacion' => $datos['puntuacion'],
        'premio' => $premio
        ];
}
return $arrayCompleto;
} 




function generarIniciales($arrayJugadores){
    $iniciales=[];
    foreach ($arrayJugadores as $jugador) {
        $separado =explode(" ",$jugador);//PRIMERO SEPARADOR
        $iniciales[]=substr($separado[0],0,1).substr($separado[1],0,1);//no es necesariio sprintf pq no utilizaba marcadores
    }  
    return $iniciales;
}

//utilizar file que crea un array con las filas de los ficheros
function generarFichero($arrayCompleto,$arrayJugadores, $totalPremio){
$iniciales=generarIniciales($arrayJugadores);
$datos="";
$i=0; 
foreach ($arrayCompleto as $jugador) {
    $datos = $datos.$iniciales[$i]."#".$jugador['puntuacion']."#".$jugador['premio']."\n";//no es necesario $datos = sprintf("%s#%d#%s\n", $iniciales, $puntos, $premio);
    $i++;
}    
$ultimaFila=sprintf("TOTAL PREMIOS#$totalPremio");//aun no hay mas jugadores asquie no tengo nada que sumar
    
//sacar fecha
$fecha = date('dmYHis');// día mes año hora minutos segundos
$nombre="apuestas_".$fecha.".txt";//si pongo print solo me devulve 1
file_put_contents($nombre, $datos.$ultimaFila);//no pongo file append porque supongo que se crea uno en cada partida
return $nombre;
}

function escribirFichero($nombre){
    readfile($nombre);
}










?>
