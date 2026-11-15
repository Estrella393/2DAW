
```php
<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
    <h1>bolsa6.php</h1>
    <input type="submit" name="mostrar" value="Mostrar resultados relevantes">
</form>

<?php
require "funciones.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $lineas = file("ibex35.txt");

        if ($lineas === false) {
            throw new Exception("No se ha podido leer el fichero");
        }

        $lineasSinCabecera = array_slice($lineas, 1);

        foreach ($lineasSinCabecera as $linea) {
            $linea = str_replace('−', '-', $linea);

            $datos[] = [
                'valor'  => trim(substr($linea, 0, 16)),
                'ultimo' => formatoEspañol(trim(substr($linea, 17, 7))),
                'vol'    => formatoEspañol(trim(substr($linea, 67, 12))),
                'capit'  => formatoEspañol(trim(substr($linea, 80, 9)))
            ];
        }

        $campos = ['ultimo', 'vol', 'capit'];

        ?>

        <table>
            <tr>
                <th colspan="2">Resultados</th>
            </tr>

            <?php
            foreach ($campos as $campo) {
                $valores = [];
                // guardo los valores del campo actual para poder utilizar la funcion max y min sobre eso
                foreach ($datos as $valor) {
                    $valores[] = $valor[$campo];//añado en el array valores todos los numeros de ese campo
                }

                
                $max = max($valores);
                $min = min($valores);

                // Busco las posiciones para sacar los nombres
                $posMax = array_search($max, $valores);
                $posMin = array_search($min, $valores);
                $nombreMax = $datos[$posMax]['valor'];
                $nombreMin = $datos[$posMin]['valor'];
            ?>

            <tr>
                <td>Valor con la máxima <?php echo $campo; ?>:</td>
                <td><?php echo $nombreMax . "(". $max .")"; ?></td>
            </tr>

            <tr>
                <td>Valor con el mínimo <?php echo $campo; ?>:</td>
                <td><?php echo $nombreMin . "(". $min .")"; ?></td>
            </tr>

            <?php
            }
            ?>

        </table>

        <?php

    } // cierro try

    catch (Exception $exception) {
        echo "Error de try-catch: " . $exception->getMessage();
    }

} // cierro if

?>

</BODY>

</HTML>
```