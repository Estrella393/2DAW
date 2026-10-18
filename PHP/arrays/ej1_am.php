<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table{
        border-collapse: collapse; 
        text-align: center;
    }
    .borde{
        border: 1px solid black;
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

//matriz 3x3 pero tabla 4x4
echo "<table>";
echo "<tr>
<td></td>";

for ($i=1; $i<=3; $i++) {//solo para escribir col
    echo "<td>Col " . $i . "</td>";
}
echo "</tr>";

//las 3 filas restantes
for ($j = 0; $j < 3; $j++) {//solo para escribir fila
    echo "<tr>";
    echo "<td> Fila " . ($j + 1) . "</td>";//sumo uno para que vaya de 1 a 3

    for ($i=0; $i<3; $i++) {
        echo "<td class='borde'>";//solo le pongo borde visible a esta parte
        echo $matriz[$j][$i];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

</table>


</BODY> 
</HTML> 