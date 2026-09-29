

<HTML> 
<HEAD><TITLE> EJ1 Bucles – Estadística secuencia </TITLE></HEAD> 
<BODY>
<table border=1>
    <tr>
        <th>Operación</th>
        <th>Resultado</th>
</tr>  
<?php //tengo que cerrar para meter una columna, pero no se puerde las variables
   $num=8; 
   $res=0;
   for ($mult=1 ;$mult<=10;$mult++){ 
    $res=$num*$mult?>
   
   <tr>
    <td><?php echo "$num x $mult"; ?></td>
    <td><?php echo $res; ?></td>
     </tr>
     <?php 
   }

?> 
</BODY> 
</HTML> 