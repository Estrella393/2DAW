
<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE></HEAD> 
<BODY> 
<?php 
    $inicio = 1; 
    $fin = 100; 

    $suma=0;
    $contPar = 0;
    $contImpar = 0;
    $cont3=0;

for ($inicio=1 ;$inicio<100;$inicio++){
    $suma=$suma+$inicio;
    if ($inicio%2==0){
        $contPar++;
    }
    else {
        $contImpar++;
    }

    if ($inicio%3==0){
        $cont3++;
    }   
}
print("Números del 1 al 100 <br>");
printf("Cantidad de números: $inicio <br>");
printf("Números pares: $contPar <br>");
printf("Números impares: $contImpar <br>");
printf("Múltiplos de 3: $cont3 <br>");
printf("Suma total: $suma <br>"); 
?> 
</BODY> 
</HTML> 