

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>

</HEAD> 
<BODY>
<?php
$primero = array ( "Programación", "Bases de Datos", "Lenguajes de Marcas", "Sistemas informáticos"); 
$segundo = [ "DWES", "DWEC", "Despliegue", "Diseño de Interfaces Web"]; 
$optativas = ["Inglés Profesional","Digitalización"];

$arrayJunto=$primero;
for ($i= 0; $i<count($segundo); $i++) {
    $arrayJunto[]=$segundo[$i];
}
foreach ($optativas as $valor) {
    $arrayJunto[]=$valor;
}
var_dump($arrayJunto);
echo "<br>";

$arrayJunto2 = array_merge($primero, $segundo, $optativas);
var_dump($arrayJunto2);
echo "<br>";

$arrayJunto2[]="Proyecto intermodular";
var_dump($arrayJunto2);
echo "<br>";

if (in_array("DWES", $arrayJunto2)) {
    echo "Esta en el array";
} else {
    echo "No esta";
}
echo "<br>";

echo array_search("DWES", $arrayJunto2);//posicion

unset($arrayJunto2[array_search("DWES", $arrayJunto2)]);//posicion con[]

sort($arrayJunto2);
var_dump($arrayJunto2);
?>

<ul>
    <?php
    foreach($arrayJunto2 as $valor) {
      ?>  
      <li><?php echo $valor ?></li>
      <?php
    }
    ?>
</ul>

</BODY> 
</HTML> 