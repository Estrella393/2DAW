<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>
<?php

$nombre=" aLBeRTo gaRCia loPEZ ";
$nombreS=trim($nombre);
print("Cadena original:\"$nombreS\"<br>");

$nombreM=strtolower($nombreS);
$nombreN=ucwords($nombreM);

printf("Nombre normalizado: $nombreN <br>");


printf("Números de caracteres(con espacios internos): ".strlen($nombreS) ."<br>");

//forma concreta:
printf("Nombre: ".substr($nombreN, 0, 7) ."<br>");

//forma gerenal:
$nomArray=explode(" ", $nombreN);
printf("Nombre: $nomArray[0] <br>");
printf("Primer apellido: $nomArray[1] <br>");
printf("Segundo apellido: $nomArray[2] <br>");

printf("Iniciales: ".substr($nomArray[0],0,1).".".substr($nomArray[1],0,1).".".substr($nomArray[2],0,1).".<br>");

$nomArrayM=explode(" ", $nombreM);

printf("Nombre de usuario: $nomArrayM[0].$nomArrayM[1]");

/*pequeño resumen con ejemplo de printf y echo (concatenar con funciones y saltos de linea)
aqui pongo el br separado ya que quiero que salte de linea despues de la funcion
printf("Nombre normalizado: ". ucwords(strtolower($nombreS)) ."<br>");
%s inserta una cadena y %d un entero, en este caso meto el br en las primeras comillas PERO detras del %s
printf("Nombre normalizado: %s<br>", ucwords(strtolower($nombreS)));
y con echo(salto de lines incorporado):
echo "Nombre normalizado: ".ucwords(strtolower($nombreS))."<br/>"; */
?>
</BODY>
</HTML>