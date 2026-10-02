

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
        margin: 0 auto;
    }
</style>
</HEAD> 
<BODY>
 
<?php 
//numeros aleatorios : rand

$array= array();//poner la palabra array antes de los ()

$sumaPar=0;
$contPar=0;
$maxPar=0;

$sumaImpar=0;
$contImpar=0;
$maxImpar=0;


//meter foreach
//var_dump : muestra el array con indices y su tipo (tambien vale para mostar otros tipos de datos)
while (count($array)<20){
    $array[]=rand(1,100);//va anadiendo en la ultima posicion
}

foreach ($array as $num){//$num es el contenido, NO el indice
    if ($num%2==0){
        $sumaPar=$sumaPar+$num;
        $contPar++;
        if ($num>$maxPar){
            $maxPar=$num;
        }
    }
    else{
        $sumaImpar=$sumaImpar+$num;
        $contImpar++;
        if ($num>$maxImpar){
            $maxImpar=$num;
        }
    }
}

$mediaPar=$sumaPar/$contPar;
$mediaImpar=$sumaImpar/$contImpar;
?> 
<table>
    

    <tr><!--filas-->
         <td></td>
         <td>Suma</td>
         <td>Media</td>
         <td>Valor mayor</td>
         <td>Cantidad</td>
    <tr> 
        
    <tr>
         <th>Par</th><!--encabezado en negrita-->
         <td><?php echo  $sumaPar?> </td>
         <td><?php echo $mediaPar?></td>
         <td><?php echo $maxPar?></td>
         <td><?php echo $contPar?></td>
    <tr>

     <tr>
        <th>Impar</th>
         <td><?php echo $sumaImpar?> </td>
         <td><?php echo $mediaImpar?></td>
         <td><?php echo $maxImpar?></td>
         <td><?php echo $contImpar?></td>
    <tr>


    

</BODY> 
</HTML> 