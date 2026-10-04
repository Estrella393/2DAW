
<?php 
$alumnos=array("Pepe"=> 40,"Maria"=> 20,"Carmen"=> 30,
"Alba"=> 42,"Juan"=> 18);

//var_dump($alumno)
foreach ($alumnos as $nombre => $edad) {//o utilizar key($alumnos) y $edad
    print($nombre . " tiene " . $edad . " años<br>");
}
//PHP mantiene un puntero interno que señala a una posición del array.
reset($alumnos);//vuelve al principio
next($alumnos);//siguiente posicion
next($alumnos);//señala
echo key($alumnos) . " tiene " . current($alumnos) . " años<br>";
//key para el indice asocitativo y current para que no me devulve todo el array

asort($alumnos);
echo key($alumnos) . " tiene " . current($alumnos) . " años<br>";
var_dump($alumnos);
end($alumnos);
echo key($alumnos) . " tiene " . current($alumnos) . " años<br>";
?> 