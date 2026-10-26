

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table{
        border-collapse: collapse; 
       /* margin-left:15px*/
    }
    td{
        border: 1px solid black;
        padding: 5px;/*aumento solo el espacio a la izquierda*/
        text-align: center;
    }

</style>
</HEAD> 
<BODY>
  
<?php
$matriz = array(
    array(2, 4, 6, 9, 7),
    array(8, 10, 12, 1, 12),
    array(14, 16, 88, 3, 15)
);

echo "<table>";

for ($fila=0; $fila<3; $fila++) {
    echo "<tr>";
    for ($col=0; $col<5; $col++) {
        echo "<td>" . $matriz[$fila][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

for ($fila=0; $fila<3; $fila++) {
    for ($col=0; $col<5; $col++) {
    echo "(" .($fila+1). "," .($col + 1). ") = ".$matriz[$fila][$col] ." - ";
    }
}    
echo "<br>";



for ($col=0; $col<5; $col++) {
    for ($fila=0; $fila<3; $fila++) {
    echo "("  .($fila+1). "," .($col + 1). ") = ".$matriz[$fila][$col] ." - ";
    } 
}


?>



</BODY> 
</HTML> 