
<?php 
$productos = array( "MON01" => 189.99, "TEC02" => 45.50, "RAT03" => 25.99, 
"SSD04" => 79.95,"RAM05" => 54.00); 


foreach ($productos as $nombre => $precio) {//o utilizar key($alumnos) y $edad
    print($nombre . " : " . $precio . "<br>");
}


$menor=array_search(min($productos), $productos);
$mayor=array_search(max($productos), $productos);
$media=array_sum($productos)/count($productos);

echo "Producto más barato ".$menor." que cuesta ".$productos[$menor]."<br>";
echo "Producto mas caro  ".$mayor." que cuesta ".$productos[$mayor]."<br>";
echo "La media es ".$media."<br>";

echo "Productos por encima de la media <br>";
foreach ($productos as $nombre => $precio) {//o utilizar key($alumnos) y $edad
    if ($precio>$media){
        echo $nombre . " que cuesta " . $precio . "<br>";
    }
}


asort($productos);//precio
var_dump($productos);
echo "<br>";

ksort($productos);//nombre
var_dump($productos);
echo "<br>";

echo array_key_exists("RAM05", $productos);//1 existe
?> 