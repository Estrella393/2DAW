
<HTML> 
<HEAD><TITLE> EJ6 Bucles – Simulador de ahorro </TITLE></HEAD> 
<BODY> 
 
<?php 
   $capital = 1000; //lo utilizo para ir sumando
   $interes = 5; //por ciento
   $anios = 5; 

   echo "Capital inicial: $capital € <br>";

   for ($i=1 ;$i<=$anios;$i++){
      $capital = $capital + ($capital * $interes / 100);
      echo "Año".$i." ".round($capital,2) ."€ <br>" ;

   }
   echo "Capital final: ".round($capital,2) ."€ <br>";
?>
 
</BODY> 
</HTML>