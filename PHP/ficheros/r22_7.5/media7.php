<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Resultado de la partida — Siete y Media</title>
<link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
<main class="shell">
<header class="banner"><h1>🂡 Juego de las Siete y Media</h1><p>Reto 2.2 · Resultado de la partida</p></header>
<section class="panel">
	
	<h2>Cartas y puntuaciones</h2>
    <?php
    require_once "media7fun.php";


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jugador1=$_POST["jugador1"];
    //$jugador2=$_POST["jugador2"];
    //$jugador3=$_POST["jugador3"];
    //$jugador4=$_POST["jugador4"];
    $cartas=$_POST["cartas"];
    $apuesta=$_POST["apuesta"];

    //$jugadores=[$jugador1,$jugardor2,$jugardor3,$jugardor4];
    $baraja=crearBaraja();
    var_dump($baraja);

    $cartasRepartidas=repartir($baraja, $cartas);
    $puntuacion=calcularPuntuacion($cartasRepartidas);
    var_dump($cartasRepartidas);
    echo $puntuacion."<br>";

    $totalPremio=calcularPremio($puntuacion, $apuesta);//no hago un echo porque la probia funcion lo escribe
    echo "<br>";
    generarFichero($jugador1, $puntuacion, $totalPremio);

    }
    ?>
	
    <h2 style="margin-top:25px">Fichero generado</h2>
    

<p style="margin-top:22px"><a class="back" href="media7.html">← Volver al formulario</a></p>
</section>
</main>
</body>
</html>
