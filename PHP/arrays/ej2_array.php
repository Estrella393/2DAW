

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
        margin: 0 auto;
    }
</style>
</HEAD> 
<BODY>
 

<table>
     <tr>
        <th>Día</th>
        <th>Temperatura</th>
        <th>Diferencia día anterior</th>
    </tr> 

<?php 
$temperaturas = array (18, 21, 19, 24, 25, 22, 20, 26, 23, 21);
$max = max($temperaturas);
$min = min($temperaturas);
$media=array_sum($temperaturas)/count($temperaturas);
$encimaMedia=0;

for ($num=0 ;$num<count($temperaturas);$num++){ 
    
    ?>
         <tr>
         <td><?php echo $num + 1; ?></td><!-- quiero que empieze con dia 1, pero no aumentar un dia el indice de temperaturas -->
         <td><?php echo $temperaturas[$num]; ?></td>
         <td><?php 
            if ($num > 0) {//empiezo desde el dia 2 , que es terperatura[1]
                $resultado = $temperaturas[$num] - $temperaturas[$num - 1];
                if ($resultado>0) {//en vez de esto puedo usar el formato printf("%+d", $diferencia);
                    echo "+$resultado";
                } 
                else {
                    echo $resultado;
                }

            } 
            else { //dia 1 , pongo -
                echo '-';
                } ?>
        </td>
        </tr>
        <?php 
        if ($temperaturas[$num]>$media){//cuidado con las s en la variables
            $encimaMedia++;
        }
 }
?> 
</table>

 <?php 
print "Temperatura máxima: $max <br>";
print "Temperatura mínima: $min <br>";
print "Temperatura media: $media <br>";
print "Días por encima de la media: $encimaMedia <br>";
?> 


</BODY> 
</HTML> 