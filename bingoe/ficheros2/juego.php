<?php
function juego($bolasSacadas, &$jugador1){//pasar por referencia &$jugador1 para que los cambios se muestren
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
    return $cartonesGanadores;
}
?>