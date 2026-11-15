

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
        //array_pop($campos); realmente no es necesario, ya no lo estoy incluyendi en $datos
        $datos[] = [
            'valor'  => $campos[0],
            'ultimo'  => $campos[1],
            'max'  => $campos[5],
            'min'  => $campos[6]
        ];
    }

    $existe=false;
    foreach ($datos as $valor) { 
        if($nombre==$valor['valor']){
            $existe=true;//si encuentra el valor
            echo "El valor <strong>Cotización</strong> de " .$nombre." es ".$valor['ultimo']."<br>"; 
            echo "<strong>Cotización Máxima</strong> de " .$nombre." es ".$valor['max']."<br>";
            echo "<strong>Cotización Mínima</strong> de " .$nombre." es ".$valor['min'];
            } //cierro if
        
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