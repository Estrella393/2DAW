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
    $jugador1=limpiar($_POST["jugador1"]);
    $jugador2=$_POST["jugador2"];
    $jugador3=$_POST["jugador3"];
    $jugador4=$_POST["jugador4"];
    $cartas=limpiar($_POST["cartas"]);
    $apuesta=limpiar($_POST["apuesta"]);

    $jugadores=[$jugador1,$jugardor2,$jugardor3,$jugardor4];
    $baraja=crearBaraja();

    $arrayJugadoresCarta=repartir($baraja, $cartas);
    $puntuacion=calcularPuntuacion($arrayJugadoresCarta);
    //var_dump($cartasRepartidas);
    //echo $puntuacion."<br>";

    $totalPremio=calcularPremio($puntuacion, $apuesta);//no hago un echo porque la probia funcion lo escribe
    echo "<br>";
    $nombreFichero=generarFichero($jugador1, $puntuacion, $totalPremio);

    $jugadores[] = [
    "nombre" => $jugador1,
    "cartas" => $cartasRepartidas,
    "puntuacion" => $puntuacion,
    "premio" => $totalPremio
    ];
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td>".$jugadores[0]["nombre"]."</td>";
    echo "<td><div class='cards'>";
    foreach($jugadores[0]["cartas"] as $carta=>$valor){
        echo "<img src=' images/".$carta."'  width='100' >";
    }
    echo "</div></td>";
    echo "<td>".$jugadores[0]["puntuacion"]."</td>";
    echo "<td>".$jugadores[0]["premio"]."</td>";
    echo "</tr>";
    echo "</table>";


    }
    ?>
	
    <h2 style="margin-top:25px">Fichero generado</h2>
    <?php 
    echo $nombreFichero; 
    echo "<br>";
    escribirFichero($nombreFichero); ?>
    

<p style="margin-top:22px"><a class="back" href="media7.html">← Volver al formulario</a></p>
</section>
</main>
</body>
</html>
