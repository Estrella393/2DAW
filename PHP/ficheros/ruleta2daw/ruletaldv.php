<?php 

    function leerFichero(){
        $jugadores = [];    
    
            $archivo = fopen("fichero_apuesta.txt", "r");
            if($archivo){
                while(($linea = fgets($archivo)) !== false){
                    $linea = trim($linea, "\r\n#");

                    if($linea === "") continue;

                    $cachos = explode("##", $linea);
                    $cachitos = explode("$", trim($cachos[2], "$"));
                    
                    $dni = $cachos[0];
                    $nombre = $cachos[1];
                    $apuestas = $cachitos;
                    $saldo = $cachos[3];

                $jugadores[] = [
                    'dni'      => $dni,
                    'nombre'   => $nombre,
                    'apuestas' => $apuestas,
                    'saldo'    => $saldo,
                ];

                }

                fclose($archivo);
            }

            return $jugadores;
    }

    function obtenerNumero()
    {
        return random_int(0, 36);   // 0..36 ambos incluidos
    }

    function obtenerColor($numero) 
    {
        // Números rojos de la ruleta (el resto, salvo el 0, son negros)
        $rojos = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];

        if ($numero === 0) { //si sale 0...
            return 'Verde';
        }
        return in_array($numero, $rojos, true) ? 'Rojo' : 'Negro'; //compara los numeros con los rojos, si es true = rojo. Si es false=negro
    }

    function tipoNumero($numero)
    {
        if ($numero == 0) { //si es 0 no devuelve nada
            return " ";
        } elseif ($numero % 2 == 0) {
            return "Par";
        } else {
            return "Impar";
        }
    }

    function apuestaPF($numero)
    {
        if ($numero == 0) {
            return " ";         // el 0 no es ni Falta ni Pasa
        } elseif ($numero <= 18) {
            return "Falta";     // 1-18
        } else {
            return "Pasa";      // 19-36
        }
    }

    function calcularPremio($apuestas, $numero, $color, $tipo, $pf)
    {
        $incremento = 0;

        foreach ($apuestas as $apuesta) {
            if (is_numeric($apuesta)) { //is_numeric busca numeros INT y detecta números dentro de STR
                //se conevrtimos la apuesta a int
                if ((int)$apuesta === $numero) { 
                    $incremento += 36;
                }
            } elseif ($apuesta === $color || $apuesta === $tipo || $apuesta === $pf) {
                $incremento += 2;
            }
        }

        return $incremento;
    }


    function calcularResultados($jugadores, $bola, $color, $tipo, $pf)
    {
        $resultados = [];

        foreach ($jugadores as $j) { //foreach para repartir los premios
            $incremento = calcularPremio($j['apuestas'], $bola, $color, $tipo, $pf);

            $resultados[] = [
                'dni'        => $j['dni'],
                'nombre'     => $j['nombre'],
                'incremento' => $incremento,
                'cartera'    => $j['saldo'] + $incremento,
            ];
        }

        return $resultados;
    }

    // COMPROBACIONES
    $jugadores = leerFichero();
    $bola  = obtenerNumero();
    $color = obtenerColor($bola);
    $tipo = tipoNumero($bola);
    $pf = apuestaPF($bola);

    echo "BOLA: $bola $color $tipo $pf <br>";

    $resultados = calcularResultados($jugadores, $bola, $color, $tipo, $pf);

    foreach ($resultados as $r) {
        echo "{$r['nombre']}: +{$r['incremento']}€={$r['cartera']}€ <br>";
    }

    const ficherosResultados = 'resultados.txt';
    const ficheroApuestas = 'fichero_apuesta.txt';

    function guardarResultados($resultados, $ruta)
    {
        $archivo = fopen($ruta, 'w');

        if ($archivo) {
            foreach ($resultados as $r) {
                $linea = [$r['dni'], $r['nombre'], $r['incremento'], $r['cartera']];
                fwrite($archivo, implode('##', $linea) . "\n");
            }
            fclose($archivo);
            return ($archivo);
        }
    }

    guardarResultados($resultados, 'resultados.txt');

    function sobreescribirArchivoLlegada(){
        //ficheroReg.txt

    }
?>