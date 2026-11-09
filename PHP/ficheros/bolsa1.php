
<!--hacer una exception con trigger_error(creado) y otro con set_expection_handler(automatico)-->
<HTML>

<HEAD>
    <TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
</HEAD>

<BODY>

<form action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>
    <input type="submit" name="mostrar" value="Mostrar resultados">
</form>

<?php
require "funciones.php";
    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fichero = fopen("ibex35.xt", "r");//r de lectura

    if ($fichero){//comprobamos que se ha abierto correctamente
    $lineas = file("ibex35.txt");//file lee su contenido y devuleve un array hecho de las filas
    //$datos = []; no lo utilico fuers
    $lineasSinCabecera=array_slice($lineas, 1);
    foreach ($lineasSinCabecera as $linea) {//extraemos una parte del array, empezamos por 1
        $campos = preg_split('/\s{2,}/',$linea);//separo en campos cada linea
        /*\s: cualquier espacio en blanco.
        {2,}: dos o más veces. */
        array_pop($campos);//eliminar hora despues de hacer los campos

        $datos[] = [//Estamos añadiendo un nuevo array asociativo dentro de $datos
            'valor'  => $campos[0],
            'ultimo'  => $campos[1],
            'var%' => $campos[2],
            'var'     => $campos[3],
            'ac año' => $campos[4],
            'max'  => $campos[5],
            'min'  => $campos[6],
            'vol' => $campos[7],
            'capit' => $campos[8]
        ];
    }
        ?>

        <table>
            <tr>
                <th>Valor</th>
                <th>Último</th>
                <th>Var%</th>
                <th>Var</th>
                <th>Ac% año</th>
                <th>Máx</th>
                <th>Min</th>
                <th>Vol</th>
                <th>Capit</th>
            </tr>

            <?php foreach ($datos as $valor) { ?>
                <tr>
                    <td><?php echo $valor['valor']; ?></td>
                    <td><?php echo $valor['ultimo']; ?></td>
                    <td><?php echo $valor['var%']; ?></td>
                    <td><?php echo $valor['var']; ?></td>
                    <td><?php echo $valor['ac año']; ?></td>
                    <td><?php echo $valor['max']; ?></td>
                    <td><?php echo $valor['min']; ?></td>
                    <td><?php echo $valor['vol']; ?></td>
                    <td><?php echo $valor['capit']; ?></td>
                </tr>

            <?php
            } 
        ?>

        </table>

        <?php 
        fclose($fichero);

    } else {
       trigger_error("No existe o no se ha podido abrir el fichero");
       throw new Exception("Con throw: No se ha podido abrir el fichero");
    }
}


    ?>

</BODY>

</HTML>