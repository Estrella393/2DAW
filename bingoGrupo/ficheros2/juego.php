<?php
function bombo(){
    $bolasSacadas = array();
   
   while(count($bolasSacadas) < 60){
        $bola = rand(1, 60);


        if(!in_array($bola, $bolasSacadas)){
            $bolasSacadas[] = $bola;
        }
    }
    return $bolasSacadas;
}


function cartones(){
      $jugador1 = [
        "carton1A" => [],
        "carton1B" => [],
        "carton1C" => [],
    ];
    // Generamos 15 números y 6 nulos
    $numeros = [];
    for ($i = 0; $i < 21; $i++) {
        if ($i < 15) {
            $numeros[] = rand(1, 60);
        } else {
            $numeros[] = 0;
        }
    }
    // Llenamos los cartones del jugador 1 con array_chunk
    shuffle($numeros);
    $jugador1["carton1A"] = array_chunk($numeros, 7);
    shuffle($numeros);
    $jugador1["carton1B"] = array_chunk($numeros, 7);
    shuffle($numeros);
    $jugador1["carton1C"] = array_chunk($numeros, 7);

    return $jugador1; //devolvemos array jugador que incluye sus 3 cartones
}





function juego($bolasSacadas, $jugador1){//pasar por referencia &$jugador1 para que los cambios se muestren
//en cambio, bolas sacadas no lo modifica
    $bingo = false;
    $cartonesGanadores = [];


    foreach ($bolasSacadas as $bolaActual) {
        echo "La bola que ha salido es: $bolaActual<br>";


        foreach ($jugador1 as $nombreCarton => $carton) {
            // Para que cuando un carton se haya guardado en ganadores, se lo salte
           if (in_array($nombreCarton, $cartonesGanadores)) {
                continue;
            }
            $quedanNumeros = false;


            foreach ($carton as $numeroFila => $fila) {
                foreach ($fila as $numeroColumna => $valor) {
                    if ($valor === $bolaActual) {
                        // Tachamos el número
                        $jugador1[$nombreCarton][$numeroFila][$numeroColumna] = 0;
                    } elseif ($valor !== 0) {
                        // Sigue habiendo algún número sin tachar
                        $quedanNumeros = true;
                    }
                }
            }


            // Si no queda ninguno, este cartón ha hecho Bingo
            if (!$quedanNumeros) {
                echo "Bingo! en $nombreCarton<br>";
                $bingo = true;
                $cartonesGanadores[] = $nombreCarton;
            }
        }
    }
    return $jugador1;
    
}
?>