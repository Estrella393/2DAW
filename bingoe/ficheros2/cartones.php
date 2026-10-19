<?php
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
?>