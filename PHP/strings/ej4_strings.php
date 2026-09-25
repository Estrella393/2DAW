<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>
<?php
$titulo="Introducción a la Programación Web con PHP";

printf("http://".str_replace(" ","-",strtolower($titulo)));
?>
</BODY>
</HTML>