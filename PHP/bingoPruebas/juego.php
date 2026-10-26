
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador+Bombo+Descarte</title>
</head>
<body>
    <?php

//------ 1. BOMBO
$bolasSacadas = array();

while (count($bolasSacadas) < 60) {
    $bola = rand(1, 60);

    if (!in_array($bola, $bolasSacadas)) {
        $bolasSacadas[] = $bola;
    }
}


//------ 2. JUGADORES Y CARTONES

$jugadores = [];

for ($jugador = 1; $jugador <= 4; $jugador++) {

    $jugadores["jugador" . $jugador] = [];//se crea el array para cada jugador 

    for ($carton = 0; $carton < 3; $carton++) {

        if ($carton == 0) {//al primer carton le pone la letra A
            $letra = "A";
        } elseif ($carton == 1) {
            $letra = "B";
        } else {
            $letra = "C";
        }

        $nombreCarton = "carton" . $jugador . $letra; //se los arrays cartones (ej:carton1A)

        // Generamos 15 números y 6 nulos
        $numeros = [];

        for ($i = 0; $i < 21; $i++) {
            if ($i < 15) {
                $numeros[] = rand(1, 60);
            } else {
                $numeros[] = null;
            }
        }

        shuffle($numeros);

        $jugadores["jugador" . $jugador][$nombreCarton] = array_chunk($numeros, 7);
        // ej: $jugadores["jugador2"]["carton2A"] accede al carton A del jugador 2, despues divide ese carton en lifas de 7 numeros
    }
}


//------ 3. LÓGICA DE JUEGO

foreach ($bolasSacadas as $bolaActual) {

    echo "La bola que ha salido es: $bolaActual<br>";//del array bolas sacadas que ya tenemos creado, te dice una sola

    // Recorremos los jugadores
    foreach ($jugadores as $nombreJugador => $cartones) {

        // Recorremos los cartones de cada jugador
        foreach ($cartones as $nombreCarton => $carton) {

            // Recorremos las filas
            foreach ($carton as $numeroFila => $fila) {

                // Recorremos los números de cada fila
                foreach ($fila as $numeroColumna => $valor) {

                    if ($valor == $bolaActual) {
                        $jugadores[$nombreJugador][$nombreCarton][$numeroFila][$numeroColumna] = null;
                    }

                }
            }
        }
    }
}


/// Comprobamos si carton ha terminado o no

foreach ($jugadores as $nombreJugador => $cartones) {

    foreach ($cartones as $nombreCarton => $carton) {

        $hayNumeros = false;//para cada carton lo ponemos false

        foreach ($carton as $fila) {

            foreach ($fila as $valor) {

                if ($valor !== null) {//si encontramos algun numero sabemos que aun no ha ganado
                    $hayNumeros = true;
                }

            }
        }

        if ($hayNumeros == false) {
            echo "Bingo! Ha ganado $nombreJugador con el $nombreCarton<br>";
            break;
        }
    }
}
//var_dump($jugadores);

?>
</body>
</html>