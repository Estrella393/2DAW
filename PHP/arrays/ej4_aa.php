

<?php 
$notas = array ("Ana" => 7.5,"Luis" => 4.2, "Alba" => 9.1, "Pedro" => 5.8, 
"Lucía" => 6.7,  "Carlos" => 3.9);


foreach ($notas as $nombre => $nota) {//o utilizar key($alumnos) y $edad
    print($nombre . " ha sacado " . $nota . "<br>");
}

$menor=array_search(min($notas), $notas);
$mayor=array_search(max($notas), $notas);
$media=array_sum($notas)/count($notas);

echo "El alumno con peor nota es ".$menor." con un ".$notas[$menor]."<br>";
echo "El alumno con mejor nota es ".$mayor." con un ".$notas[$mayor]."<br>";
echo "La media es ".$media."<br>";



echo "Alumnos por encima de la media <br>";
foreach ($notas as $nombre => $nota) {
    if ($nota>$media){
        echo $nombre . " ha sacado " . $nota . "<br>";
    }
}


asort($notas);//nota
print "Notas ordenadas de mayor a menor <br> ";
var_dump($notas);
echo "<br>";

//n suspensos y aprobados, arrays y porcenatajes
$aprobados=array();
$contA=0;
$suspensos=array();
$contS=0;
foreach ($notas as $nombre => $nota) {
    if ($nota>=5){
        $aprobados[$nombre] = $nota;//si hiciera $aprobados[] = $nombre; anadiria solo el nombre
        $contA++;
    }
    else{
        $suspensos[$nombre] = $nota;
        $contS++;
    }
}

$porcentajeA=($contA/count($notas))*100;
echo "Hay ".$contA." aprobados, lo que es un ".round($porcentajeA, 2)." del total. <br>";
var_dump($aprobados);
echo "<br> Hay ".$contS." suspensos <br>";
var_dump($suspensos);
?> 