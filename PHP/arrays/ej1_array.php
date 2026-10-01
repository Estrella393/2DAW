

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        margin: 0 auto;
    }
</style>
</HEAD> 
<BODY>
 
<?php 
$impar=[];
$indice=0;
$suma=0;
$i=1;


//añadir los impres
while (count($impar)<20) {

    if($i%2!=0){
        $impar[]=$i;//con [] vacio coje la posicion siguiente para añadir valores 
    }
    $i++;//aqui para que cuente el 1
}?>

<table>
     <tr>
        <th>Indice</th>
        <th>Valor</th>
        <th>Suma</th>
    </tr> 

<?php 
for ($num=0 ;$num<20;$num++){ //indice hasta 19 
    $suma = $suma+$impar[$indice];
    ?>
         <tr>
         <td><?php echo $indice; ?></td>
         <td><?php echo $impar[$indice]; ?></td>
         <td><?php echo $suma; ?></td>
         </tr>
        <?php 
         $indice++;//lo incremento aqui abajo para que le primero sea 0
 }

?> 
</table>


</BODY> 
</HTML> 