
<HTML> 
<HEAD><TITLE> EJ4 Bucles – Número primo </TITLE></HEAD> 
<BODY> 
 

<?php 
   $num = 17; 
   $divisor=0;

   echo "Número analizado: $num <br>";

   for ($i=2 ;$i<$num;$i++){
    printf("Probando divisor $i: ");
    if ($num % $i==0){
        print"No divisible <br>";
        $divisor++;
    }
    else{
        print"Es divisible <br>";
    }
   }

   if ($divisor==0){
    print "$num es un numero primo";
   }
   else {
    print "no es un numero primo";
   }
?> 
</BODY> 
</HTML> 