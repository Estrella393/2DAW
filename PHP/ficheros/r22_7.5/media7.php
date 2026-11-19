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
    $jugador2=limpiar($_POST["jugador2"]);
    $jugador3=limpiar($_POST["jugador3"]);
    $jugador4=limpiar($_POST["jugador4"]);
    $cartas=limpiar($_POST["cartas"]);
    $apuesta=limpiar($_POST["apuesta"]);

    $jugadores=[$jugador1,$jugador2,$jugador3,$jugador4];

    $iniciales=generarIniciales($jugadores);

    $baraja=crearBaraja();

    $arrayJugadoresCarta=repartir($baraja, $cartas,$jugadores);
    $puntuacion=calcularPuntuacion($arrayJugadoresCarta);
    
    //solo para meter al fichero
    $totalPremio=calcularPremio($puntuacion, $apuesta);
    
    $arrayCompleto = calcularPremioIndividual($puntuacion, $apuesta);

    $nombreFichero=generarFichero($arrayCompleto, $jugadores, $totalPremio);

    
    echo "<table border='1'>";
    $i=0;
    foreach ($arrayCompleto as $jugador){
        echo "<tr>";
        echo "<td>".$iniciales[$i]."</td>";
        echo "<td><div class='cards'>";
        foreach($jugador["cartas"] as $carta=>$valor){//$jugadores[0]["cartas"]
        echo "<img src=' images/".$carta."'  width='100' >";
    }
        echo "</div></td>";
        echo "<td>".$jugador["puntuacion"]."</td>";
        echo "<td>".$jugador["premio"]."</td>";
        echo "</tr>";
    }
    
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
