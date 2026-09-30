

<HTML> 
<HEAD><TITLE> EJ8 Bucles – Conversor Decimal a base n </TITLE></HEAD> 
<BODY> 
 
<?php 
     $num="48"; 
     $base="8"; 

    $conversion="";
while ($num>0){
    $resto=$num%$base;
    $conversion=$resto.$conversion;//no utilizar + para concatenar, utilizar .
    
    $num = intdiv($num, $base);
    }

if ($base==2){
    printf("%08d",$conversion);
}
else{
    printf($conversion);
}


 
?> 
 
</BODY> 
</HTML> 