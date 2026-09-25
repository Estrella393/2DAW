<HTML>
<HEAD><TITLE>EJ1 Strings -Conversor de decimal a binario </TITLE></HEAD>
<BODY>
<?php
$ip="192.18.16.204";
//%=empieza formato, 0=rellena con ceros(IMPORTANTE porque los binarios tienen 0 antes), 8=octeto y b lo pasa a binario

printf("La IP $ip en binario es %08b.%08b.%08b.%08b <br>", 192,18,16,204) ;
// otra forma de salto de linea en printf: "texto", "<br>"

//FORMA MAS GENERAL:
//funcion explode: separa y puedes acceder como un array
$ipArray = explode (".",$ip);
printf("La IP $ip en binario es %08b.%08b.%08b.%08b", $ipArray[0], $ipArray[1], $ipArray[2], $ipArray[3])  ;
?>
</BODY>
</HTML>