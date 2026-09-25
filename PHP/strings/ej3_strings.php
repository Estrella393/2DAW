<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>
<?php
//strpos(cadena,subcadena) busca una cadena y devuelve la posicion 
//str_ends_with() busca si termina en una determinada cadena


$email="alberto.garcia@educa.madrid.org";

echo "Email: $email"."<br>";


$numFin=strlen($email)+1;//porque en substr es 0 la primera posición
$arroba=strpos($email,"@");
$parte1=substr($email,0,$arroba);
$parte2=substr($email,$arroba+1,$numFin);

echo "Usuario $parte1"."<br>";
echo "Dominio $parte2"."<br>";


$array= explode(".",$parte2);
printf("Organización: $array[0] <br>");
printf("Extensión: $array[2] <br>");

echo("El usuario contiene " .strlen($parte1)."<br>");
echo("El del dominio contiene " .strlen($parte2)."<br>");


?>
</BODY>
</HTML>