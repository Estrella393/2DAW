
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador+Bombo+Descarte</title>
</head>
<body>
<?php

require "juego.php";


$bolasSacadas=bombo();

$jugador1=cartones();

$cartonOriginal = $jugador1;
$jugador1=juego($bolasSacadas, $jugador1);  

echo "Cartones iniciales del Jugador 1:<br>";
echo "<pre>";//solo para visualizarlo
var_dump($cartonOriginal);
echo "</pre>";


echo "Cartón final:<br>";
echo "<pre>";
var_dump($jugador1);
echo "</pre>";

?>


    
</body>
</html>