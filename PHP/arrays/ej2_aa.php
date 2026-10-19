
<?php 
$alumnos=array("Pepe"=> 7,"Maria"=> 9,"Carmen"=> 4,
"Alba"=> 7,"Juan"=> 2);


foreach ($alumnos as $nombre => $nota) {//o utilizar key($alumnos) y $edad
    print($nombre . " ha sacado " . $nota . "<br>");
}

$menor=array_search(min($alumnos), $alumnos);
$mayor=array_search(max($alumnos), $alumnos);
$media=array_sum($alumnos)/count($alumnos);

echo "El alumno con peor nota es ".$menor." con un ".$alumnos[$menor]."<br>";
echo "El alumno con mejor nota es ".$mayor." con un ".$alumnos[$mayor]."<br>";
echo "La media es ".$media."<br>";
?> 