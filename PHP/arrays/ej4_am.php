
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

// esto no va: echo max($matriz);

$max=0;
for ($fila=0; $fila<3; $fila++) {
    for ($col=0; $col<5; $col++) {
    echo "(" .($fila+1). "," .($col + 1). ") = ".$matriz[$fila][$col] ." - ";
    }
}    
echo "<br>";


?>
