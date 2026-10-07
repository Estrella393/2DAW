<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores con Carton</title>
</head>
<body>
    

<?php
 //Genero jugadores y cartones
 $jugador1 = ["carton1A" => []
 ];

//Generamos los siguientes bucles para llenar 15 espacios de números y
// 6 espacios de null
 $numeros = [];


  for ($i = 0; $i < 21; $i++) {
        if ($i < 15) {
            $numeros[] = rand(1, 60);
        } else {
            $numeros[] = null;
        }
    }


shuffle($numeros);


$jugador1["carton1A"] = array_chunk($numeros, 7);


//empezamos bombo
$bolasSacadas = [];
$bola;


while(count($bolasSacadas)<60){
            //Generamos número aleatorio 1-60
            $bola = rand(1,60);

            //Comprobamos que no esté en el array
            if(!in_array($bola, $bolasSacadas)){

                $bolasSacadas[] = $bola;
    
        
       // var_dump($bolasSacadas);

         for ($fila = 0; $fila < 3; $fila++) {//el carton es una array multidimensional, hay que mirar en filas y columnas
            for ($columna = 0; $columna < 7; $columna++) {
                if ($jugador1["carton1A"][$fila][$columna] == $bola) {// Si está, la convertimos en null
                    $jugador1["carton1A"][$fila][$columna] = null;
                }
            }
        }
        
        $ganador = true;

        for ($fila = 0; $fila < 3; $fila++) {
            for ($columna = 0; $columna < 7; $columna++) {
                if ($jugador1["carton1A"][$fila][$columna] != null) {
                    $ganador = false;
                }
            }
        }


        // Si todo son null, hemos ganado
        if ($ganador == true) {
            echo "BINGO!";
            break;//esto o poner while ($ganador == null) 
        }
    }
}
    

    ?>

   </body>
</html>