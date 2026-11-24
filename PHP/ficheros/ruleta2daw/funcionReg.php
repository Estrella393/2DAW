<?php
function agregar_registro_delim($dniReg,$nomReg, $ap1Reg, $ap2Reg, $fechReg, $aliasReg,$saldoReg)
{
    $fichero = "./ficheroReg.txt";

    //$linea = $nombre . "##" . $apellido1 . "##" . $apellido2 . "##" . $fecnac . "##" . $localidad . PHP_EOL;
    $linea = implode("##", [$dniReg, $nomReg, $ap1Reg, $ap2Reg, $fechReg, $aliasReg, $saldoReg]) . "\n";
    //PHP_EOL es un salto de página del propio programa

    $file = fopen($fichero, "a");
    //a de append, para evitar que borre lineas 
    fwrite($file, $linea);
    fclose($file);
    
    //Otra alternativa, con una sola linea
   // file_put_contents($fichero, $linea, FILE_APPEND);
    //por si acaso un append para no borrar las lineas, yt que escriba en la siguiente linea dejando intacto la anterior
}

?>