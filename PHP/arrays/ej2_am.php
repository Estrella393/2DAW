
<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table{
        border-collapse: collapse; 
        margin-left:15px
        /*text-align: center;*/
    }
    td{
        border: 1px solid black;
         padding: 2px 20px 2px 2px;/*aumento solo el espacio a la izquierda*/
    }
    div{
        display: flex;
    }
</style>
</HEAD> 
<BODY>
  
<?php
$matriz=array();
//hacemos matriz 3*3 con los multiplos de 2
$num= 0;
for ($fila=0; $fila<3; $fila++) {
    for ($col=0; $col<3; $col++) {
        $num=$num+2; //$num += 2;
        $matriz[$fila][$col]=$num;
    }
}

$sumaFilas = array();
for ($fila=0; $fila<3; $fila++) {
    $sumar=0;
    for ($col=0; $col<3; $col++) {
        $sumar =$sumar + $matriz[$fila][$col];
    }
    $sumaFilas[]=$sumar;
}


$sumaColumnas = array();
for ($col=0; $col<3; $col++) {
    $sumar=0;
    for ($fila=0; $fila<3; $fila++)  {
        $sumar =$sumar + $matriz[$fila][$col];
    }
    $sumaColumnas[]=$sumar;
}

echo '<div>';
echo 'SUMA POR FILAS';
echo '<table> ';
foreach ($sumaFilas as $suma) {
    echo"<tr><td> $suma </td></tr>";
}
echo "</table>";
echo '</div>';

echo '<div>';
echo 'SUMA POR COLUMNAS';
echo '<table>';
foreach ($sumaColumnas as $suma) {
    echo"<td> $suma </td>";
}
echo "</tr></table>";
echo '</div>';
?>

</table>


</BODY> 
</HTML> 