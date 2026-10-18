
<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>

</HEAD> 
<BODY>
    <table>
     <tr>
        <th>Decimal</th>
        <th>Binario</th><!--decbin-->
        <th>Octal</th><!--decoct-->
        <th>Hexadecimal</th><!--dechex-->
    </tr> 

 
<?php 
for ($i=0; $i<21; $i++){
    $arrayDecimal[]=$i;//creo lo 20 numros
}

//creo los arrays y despues recorro todos los numerso decimales y
//guardo en los nuevos arrays el numero convertido
$arrayBinario=array();
$arrayOctal=array();
$arrayHexal=array();
    foreach ($arrayDecimal as $num){
        $arrayBinario[]=decbin($num);/*dicvidir entre 2 y al reves*/
        $arrayOctal[]=decoct($num);//lo corchetes []
        $arrayHexal[]=dechex($num);
    }
    /*for ($i = 0; $i < count($arrayDecimal); $i++) {
    echo $arrayDecimal[$i]; */
    foreach ($arrayDecimal as $indice => $num){
        //en este caso funcionaria perfectamente con arraDecimal as $num porque coinciden
      ?>
        <tr>
        <td><?php echo $num ; ?></td>
        <td><?php echo $arrayBinario[$num] ; ?></td>
        <td><?php echo  $arrayOctal[$num]; ?></td>
        <td><?php echo $arrayHexal[$num]; ?></td>
        </tr>
    <?php 
    }
?> 
</table>


</BODY> 
</HTML> 