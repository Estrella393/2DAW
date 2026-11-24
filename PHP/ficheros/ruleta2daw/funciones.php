<?php
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generarFichero($dni, $nombre, $array_apuesta, $saldo)
{
    // 1. abrimos o creamos el archivo
    $archivo = fopen("fichero_apuesta.txt", "a"); // "a" -> para añadir al final

    // 2. preparamos el visualizado
    $visualizadoLineaApuestas = "";              // inicializar ANTES del bucle

    for ($i = 0; $i < count($array_apuesta); $i++) {
        $visualizadoLineaApuestas .= $array_apuesta[$i] . "$";   // .= acumula
    }

    $visualizadoLineaGeneral = $dni . "##" . $nombre . "##" . $visualizadoLineaApuestas . "##" . $saldo . "##";

    // 3. escribimos en el archivo
    fwrite($archivo, $visualizadoLineaGeneral . "\n");
    fclose($archivo);
}


function leer_fichero($nomFichero)
{
    $f = fopen($nomFichero, "r"); //abrir el fichero. "r" es solo lectura
    $contenido = fread($f, filesize($nomFichero));
    fclose($f); //cerrar el fichero
    return $contenido;
}

function apostar($array)
{
    $saldo = $array[6]; //meto en $saldo el saldo del jugador 

    if ($saldo > 10) {
        return "Apuesta realizada. Saldo disponible: " . $saldo;
    } else {
        return ("No tienes saldo suficiente para apostar");
    }
}


// function customError($errno, $errstr) { //función de errores
//     if ($errno==1024) {
//         echo "<b>Aplicación Ruleta:</b> El fichero no se ha podido cargar";
//     } else {
//         echo "Error: $errno - $errstr";
//     }
//     return true;
// }

?>