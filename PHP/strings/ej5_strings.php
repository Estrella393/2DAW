
<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>


<?php
$url="https://www.tienda.es/productos/portail.php?id=34&marca=lenovo";

$finProtocolo=(strpos( $url,"://"));//dice donde EMPIEZA "://"
$protocolo=substr($url,0,$finProtocolo);

$inicioD=$finProtocolo+3;//para que no salga ://
$finD=strpos($url, "/", $inicioD);;
$dominio=substr($url,$inicioD ,$finD-$inicioD);//la url, el inicio, cuantos caracteres coje

$finRuta=strpos($url,"?");//dice donde empieza "?"
$ruta=substr($url, $finD, $finRuta-$finD );//substr sustrae, strpos posicio

$array=explode("/",$ruta);//el primer no tiene contenido pq empieza por /
$fichero=$array[2];

$parametros=substr($url, $finRuta+1,);//saltamos ?, no hace falta poner fin
$arrayParametros=explode("&", $parametros);
$id = explode("=", $arrayParametros[0]);//ahora separo id de 34
$marca = explode("=", $arrayParametros[1]);//y marca de lenovo
?>
<p>Salida 1</p></br>
<?php
printf("Protocolo : $protocolo <br>");
printf("Dominio: $dominio <br>");
printf("Ruta: $ruta <br>");
printf("Fichero: $fichero <br>");
printf("Parámetros: $parametros <br>");
?>
<p>Salida 2</p></br>
<?php
printf("Protocolo : $protocolo <br>");
printf("Dominio: $dominio <br>");
printf("Ruta: $ruta <br>");
printf("Fichero: $fichero <br>");
printf("Id del producto: $id[1] <br>");
printf("Id del producto: $marca[1] <br>");

?>
</BODY>
</HTML>