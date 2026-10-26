

<HTML>
<HEAD> <TITLE> FORMULARIO BASE </TITLE>
</HEAD>
<BODY>

<form name='calculadora' action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>

Operando 1:
<input type='text' name='numfact' value='' size=15><br>

Operando 2:
<input type='text' name='numfact' value='' size=15><br>

Selecciona operacion :<BR>
<input type='radio' checked name='operacion' value='Suma'>Suma</br>
<input type='radio' name='operacion' value='Resta'>Resta</br>
<input type='radio' name='operacion' value='Producto'>Producto</br>
<input type='radio' name='operacion' value='División'>División</br>

<input type="submit" value="Alta Factura">
<input type="reset" value="borrar">
</FORM>
</BODY>
</HTML>

<?php
  //Solo ejecutar si pulsamos SUBMIT
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {	  
		echo "El method que ha usado es: ",$_SERVER['REQUEST_METHOD'],"<br>";
		echo "Nombre programa:",$_SERVER["PHP_SELF"],"<br>";
		echo  $_POST['numfact'],"<br>";
		$proveedor=$_POST['proveedor'];
		$importe=$_POST['importe'];
		$iva=$_POST['iva'];
		echo  $proveedor,"<br>";
		echo  "Importe:".$importe,"<br>";
		echo  "IVA:".$iva,"<br>";
		$totalfactura=$importe+$importe*($iva/100);
		echo "Total factura:".$totalfactura;
   }
?>