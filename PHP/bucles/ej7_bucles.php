
<HTML> 
<HEAD><TITLE> EJ7 Bucles – Conversor decimal a binario </TITLE></HEAD> 
<BODY> 
 
<?php 
     $num = 127; 
     //se divide entre dos, y sale de resto 0 o 1. El binario es al reves
    $binario="";//no 0, eso lo convertiria en un tipo numero
while ($num>0){
    $resto=$num%2;
    $binario=$resto.$binario;//no utilizar + para concatenar, utilizar .
    //$num=$num/2;
    $num = intdiv($num, 2);
    }
//$binario = strrev($binario); no es necesario dar la vuelta, si desde el principio añadado el resto antes
printf("%08d",$binario);//añadir lo ceros, d es entero decimal (es neseario decirle si es d,f o s)
?> 
 
</BODY> 
</HTML> 