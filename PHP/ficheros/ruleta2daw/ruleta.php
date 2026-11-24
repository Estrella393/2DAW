<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuesta</title>
</head>

<body>
    Apuesta a numeros
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>
            <input type="checkbox" name="numeros[]" value="0" id="n0"> 0
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="1" id="n1"> 1
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="2" id="n2"> 2
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="3" id="n3"> 3
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="4" id="n4"> 4
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="5" id="n5"> 5
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="6" id="n6"> 6
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="7" id="n7"> 7
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="8" id="n8"> 8
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="9" id="n9"> 9
        </label>
        <label>
            <input type="checkbox" name="numeros[]" value="10" id="n10"> 10
        </label>
        </br>
        Apuestas exteriores
        </br>
        <label>
            <input type="radio" name="paridad" value="par">par
        </label>
        <label>
            <input type="radio" name="paridad" value="impar">impar
        </label>
        <label>
            <input type="radio" name="mitad" value="falta">falta(1-18)
        </label>
        <label>
            <input type="radio" name="mitad" value="pasa">pasa(19-36)
        </label>
        <label>
            <input type="radio" name="color" value="rojo">rojo
        </label>
        <label>
            <input type="radio" name="color" value="negro">negro
        </label></br>
        <input type="submit" name="enviar" value="enviar apuesta">
        <input type="reset" name="limpiar" value="limpiar seleccion">

    </form>

</body>

</html>

<?php
include "funciones.php";
#set_error_handler('customError');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contenido = leer_fichero("ficheroReg.txt");
    #var_dump($contenido);
    $array = explode("##", $contenido);
    #var_dump($array);

    #var_dump($_POST);
    $numeros=$_POST['numeros'];
    $paridad=$_POST['paridad'];
    $mitad=$_POST['mitad'];
    $color=$_POST['color'];

    $numerosTexto = implode(",", $numeros); #pasamos los numeros a texto

    $apuesta = array($numerosTexto, $paridad, $mitad, $color);

    var_dump($numeros);
    var_dump($paridad);
    var_dump($mitad);
    var_dump($color);


    if (isset($_POST["enviar"])) {
        generarFichero($array[0],$array[1],$apuesta,$array[6]);
        echo "fichero generado correctamente";
    }

}
?>