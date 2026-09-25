
<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>

<p>Salida 1</p>
<?php
$url="https://www.tienda.es/productos/portail.php?id=34&marca=lenovo";

$finProtocolo=(strpos("://", $url));
$Protocolo=substr(0,$finProtocolo,$url);

$inicioD=strpos("www", $url);
$finD=strpos("es", $url);
$Dominio=substr($inicio,$fin,$url);

$finRuta(substr("?",$url));
$ruta=strpos($finD,$finRuta, $url );


printf("Protocolo : $Protocolo");
printf("Dominio: $Dominio");
?>
</BODY>
</HTML>