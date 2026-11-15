



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
    
    try{
    $lineas = file("ibex35.txt");//file ya abre el fichero por si solo, 
    //$lineas es un array cuando funciona y false cuando falla
    if ($lineas == false) {
        /*aqui da igual pero si fuera un 0:
        0 == false;   // true
        0 === false;  // false*/
        throw new Exception("No se ha podido leer el fichero");//como tengo el try-catch, en este caso va ahi, si lo quito va a funciones.php
    }

    $lineasSinCabecera=array_slice($lineas, 1);
    foreach ($lineasSinCabecera as $linea) {
        $linea = str_replace('−', '-', $linea);//substr cuenta en bytes, y −(resta) vale 3 bytes, asique lo cambio por - que vale 1
        $datos[] = [
            'valor'  => trim(substr($linea, 0, 16)),
            'ultimo' => formatoEspañol(trim(substr($linea, 17, 7))),
            'var%'   => trim(substr($linea, 25, 7)),
            'var'    => trim(substr($linea, 33, 6)),
            'ac año' => trim(substr($linea, 40, 9)),
            'max'    => trim(substr($linea, 50, 8)),
            'min'    => trim(substr($linea, 59, 7)),
            'vol'    => formatoEspañol(trim(substr($linea, 67, 12))),
            'capit'  => formatoEspañol(trim(substr($linea, 80, 9)))
        ];
    }
    $campos = ['ultimo', 'vol', 'capit'];
?><table>
    <tr>
        <th colspan="2">Resultados</th>
    </tr>
    <?php
    foreach ($campos as $campo) {//recorro eso tres
    $max=0;//cada vez vuelvo a reiniciar
    $min = PHP_FLOAT_MAX;//para asegurar que el maximo encontrado es menor
        foreach ($datos as $valor) { 
        
        
        if ($valor[$campo]>$max){
            $max= $valor[$campo];
            $nombreMax=$valor['valor'];//solo necesito inicializar necesito usar el valor anterior
        }
        if ($valor[$campo] < $min) {
            $min=$valor[$campo];
            $nombreMin = $valor['valor'];
        }
        }
    
    ?>
    
    <tr>
        <td>Valor con la máxima <?php echo $campo; ?>:</td>
        <td><?php echo $nombreMax."(".$max.")";?></td>
    </tr>
    <tr>
        <td>Valor con la mínimo <?php echo $campo; ?>:</td>
        <td><?php echo $nombreMin."(".$min.")"; ?></td>
    </tr>
    <?php
    }
    ?>
    </table>
<?php
    }//cierro try 
    catch (Exception $exception) {
    echo "Error de try-catch: " . $exception->getMessage();
    }
}//cierro if


    ?>

</BODY>

</HTML>
