


<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
    <h1>bolsa4.php</h1>
		<strong>Valor bursátil:</strong>º
        <select name="nombre">
            <option value="ACCIONA">ACCIONA</option>
            <option value="ACERINOX">ACERINOX</option>
            <option value="ACS">ACS</option>
            <option value="AENA">AENA</option>
            <option value="AMADEUS IT GROUP">AMADEUS IT GROUP</option>
            <option value="ARCELORMITTAL">ARCELORMITTAL</option>
            <option value="BANCO SABADELL">BANCO SABADELL</option>
        </select><br>

        <strong>Mostrar:</strong>
        <select name="mostrar">
            <option value="ultimo">Último</option>
            <option value="var%">Variación %</option>
            <option value="var">Variación</option>
            <option value="max">Máximo</option>
            <option value="min">Mínimo</option>
            <option value="vol">Volumen</option>
            <option value="capit">Capitalización</option>
        </select><br>
        
		<input type="submit" value="Buscar Valor">
		<input type="reset" value="Limpiar">

</form>

<?php
require "funciones.php";
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = limpiar($_POST["nombre"]);
    $mostrar = limpiar($_POST["mostrar"]);

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
            'var%' => $campos[2],
            'var'     => $campos[3],
            'ac año' => $campos[4],
            'max'  => $campos[5],
            'min'  => $campos[6],
            'vol' => $campos[7],
            'capit' => $campos[8]
        ];
    }

    
    foreach ($datos as $valor) { //foreach ($datos as $clave => $valor)
        if($nombre==$valor['valor']){
            
            echo "El valor <strong>".$mostrar."</strong> de " .$nombre." es ".$valor[$mostrar]."<br>"; 
            } //cierro if
        }//cierro for each 
        fclose($fichero);

    } else {
       //trigger_error("No existe o no se ha podido abrir el fichero");//error No necesita de mas funciones
       throw new Exception("Con throw: No se ha podido abrir el fichero");//exception Si no hay try-catch(este caso) se va a set_exception_handler
    }
}


    ?>

</BODY>

</HTML>