



<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
    <h1>bolsa5.php</h1>

        <strong>Mostrar:</strong>
        <select name="mostrar">
            <option value="ultimo">Total Último</option>
            <option value="var%">Total Variación %</option>
            <option value="var">Total Variación</option>
            <option value="max">Total Máximo</option>
            <option value="min">Total Mínimo</option>
            <option value="vol">Total Volumen</option>
            <option value="capit">Total Capitalización</option>
        </select><br>
        
		<input type="submit" value="Buscar Valor">
		<input type="reset" value="Limpiar">

</form>

<?php
require "funciones.php";
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mostrar = limpiar($_POST["mostrar"]);

    $fichero = fopen("ibex35.txt", "r");
    if ($fichero){
    $lineas = file("ibex35.txt");//file ya abre el fichero por si solo, 
    $lineasSinCabecera=array_slice($lineas, 1);
    foreach ($lineasSinCabecera as $linea) {
        $linea = str_replace('−', '-', $linea);//substr cuenta en bytes, y −(resta) vale 3 bytes, asique lo cambio por - que vale 1
        $datos[] = [
            'valor'  => trim(substr($linea, 0, 16)),
            'ultimo' => trim(substr($linea, 17, 7)),
            'var%'   => trim(substr($linea, 25, 7)),
            'var'    => trim(substr($linea, 33, 6)),
            'ac año' => trim(substr($linea, 40, 9)),
            'max'    => trim(substr($linea, 50, 8)),
            'min'    => trim(substr($linea, 59, 7)),
            'vol'    => trim(substr($linea, 67, 12)),
            'capit'  => trim(substr($linea, 80, 9))
        ];
    }

    $suma=0;
    foreach ($datos as $valor) { //foreach ($datos as $clave => $valor)
        
        $dato = str_replace('.', '', $valor[$mostrar]);//quito puntos pq si hago esto str_replace('.', '', $valor[$mostrar]); al hacer el siguiente paso TODAS LAS , pasan a ser puntos
        $dato = str_replace(',', '.', $dato);//cambio coma por punto
        //o:(float)str_replace(',', '.', str_replace('.', '', $dato)) ya que php realiza las operaciones de DENTRO hacia fuera
        
        /*utilizando funcion que cambia el fromato a español(necesita de extensión intl):
        $fmt = new NumberFormatter('es_ES', NumberFormatter::DECIMAL);
        $dato = $fmt->parse($valor[$mostrar]);
        $suma += $dato;*/
        $suma += (float) $dato;//realmente va bien sin  (float) pero me aseguro
    }
    echo "<strong>".$mostrar."</strong> : ".$suma."<br>"; 
    fclose($fichero);

    } 
    /*compribar que datos coje:
    foreach ($datos as $valor) {
    echo $valor['valor'] . " -> ";
    var_dump($valor['capit']);
}*/
}


    ?>

</BODY>

</HTML>