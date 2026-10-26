
<HTML>
<HEAD> <TITLE> FORMULARIO BASE </TITLE>
</HEAD>
<BODY>

<form name='facturas' action=<?php echo $_SERVER["PHP_SELF"];?> method='post'>

Numero Factura:
<input type='text' name='numfact' value='' size=15><br>

Proveedor:
<input type='text' name='proveedor' value='' size=15><br>

Importe:
<input type='text' name='importe' value='' size=15><br>

IVA:<BR>
<input type='radio' name='iva' value='10'>10%</br>
<input type='radio' checked name='iva' value='21'>21%</br>

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