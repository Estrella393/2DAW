
<HTML> 
<HEAD><TITLE> EJ5 Bucles - Factorial </TITLE></HEAD> 
<BODY> 
 
<?php 
   $num = 5; 
   $resultado=1;

   print"$num!=";

   for ($i=$num ;$i>=1;$i--){
    print "$i";

    if($i>1){//asi no me pone x despues del 1
        print "x";
    }

    $resultado=$resultado*$i;

   }

   print "=$resultado"
?> 
 
</BODY> 
</HTML> 