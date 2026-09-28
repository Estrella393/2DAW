<HTML>
<HEAD><TITLE>EJ1 Strings -Analizador de nombres de usuario </TITLE></HEAD>
<BODY>
<?php
$log="192.168.1.25 - GET /productos/listados.php - 200 - Mozilla/5.0";

$array1=explode(" ",$log);//0-7
$array2=explode(".",$array1[4]); //separo en dos el recurso

echo "IP: $array1[0] <br>";
echo "Método: $array1[2] <br>";
echo "Recurso: $array1[3] <br>";
echo "Código: $array1[5] <br>";
echo "Navegador: $array1[7] <br>";

echo "Tipo de recurso".strtolower($array[1])."<br>";
echo "Petición correcta: " . ($array1[5] == 200 ? "SI" : "NO");

/*if ($array1[5] == "200") { 
    echo "Petición correcta: SI"; } 
    else { 
    echo "Petición correcta: NO"; }*/

    /*peticiones:
200 → OK
201 → recurso creado correctamente
204 → correcto, pero sin contenido
301, 302 → redirecciones
404 → recurso no encontrado
500 → error del servidor*/
?>
</BODY>
</HTML>