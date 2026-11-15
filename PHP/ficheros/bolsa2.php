

<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
    <h1>bolsa2.php</h1>
		<strong>Nombre del valor:</strong><br>
        <input type="text" name="nombre" required><br>
        
		<input type="submit" value="Buscar Valor">
		<input type="reset" value="Limpiar">

</form>

<?php
require "funciones.php";
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = limpiar($_POST["nombre"]);

    $fichero = fopen("ibex35.txt", "r");
    if ($fichero){
    $lineas = file("ibex35.txt");
    $lineasSinCabecera=array_slice($lineas, 1);
    foreach ($lineasSinCabecera as $linea) {
        $campos = preg_split('/\s{2,}/',$linea);
        array_pop($campos);//quitar hora
        $datos[] = [
            'valor'  => $campos[0],
            'ultimo'  => $campos[1],
            'var%' => $campos[2],
            'var'     => $campos[3],
            'ac año' => $campos[4],
            'max'  => $campos[5],
            'min'  => $campos[6],
            'vol' => $campos[7],
            'capit' => $campos[8]
        ];
    }

    $existe=false;
    foreach ($datos as $valor) { 
        if($nombre==$valor['valor']){
            $existe=true;//si encuentra el valor
        ?>
        <table>
            <tr>
                <td>Valor:</td>
                <td><?php echo $valor['valor']; ?></td>
            </tr>
            <tr>
                <td>Último:</td>
                <td><?php echo $valor['ultimo']; ?></td>
            </tr>
            <tr>
                <td>Variación %:</td>
                <td><?php echo $valor['var%']; ?></td>
            </tr>
            <tr>
                <td>Variación:</td>
                <td><?php echo $valor['var']; ?></td>
            </tr>
            <tr>
                <td>Ac año:</td>
                <td><?php echo $valor['ac año']; ?></td>
            </tr>
            <tr>
                <td>Máximo:</td>
                <td><?php echo $valor['max']; ?></td>
            </tr>
            <tr>
                <td>Mínimo:</td>
                <td><?php echo $valor['min']; ?></td>
            </tr>
            <tr>
                <td>Volumen:</td>
                <td><?php echo $valor['vol']; ?></td>
            </tr>
            <tr>
                <td>Caoitalización:</td>
                <td><?php echo $valor['capit']; ?></td>
            </tr>

                

            <?php
            } //cierro if
        ?>
        </table>
        
        <?php
        
        }//cierro for each 
        fclose($fichero);
        if(!$existe){
            throw new Exception("No existe ese nombre en el fichero");
        }

    } else {
       //trigger_error("No existe o no se ha podido abrir el fichero");//error No necesita de mas funciones
       throw new Exception("Con throw: No se ha podido abrir el fichero");//exception Si no hay try-catch(este caso) se va a set_exception_handler
    }
}


    ?>

</BODY>

</HTML>