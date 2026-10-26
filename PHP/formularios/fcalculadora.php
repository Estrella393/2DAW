
<?php
$resultado="";
	function limpiar($dato){
		$dato=trim($dato);
		$dato=stripslashes($dato);
		$dato=htmlspecialchars($dato);
		return $dato;
	}

  //Solo ejecutar si pulsamos SUBMIT
  if ($_SERVER['REQUEST_METHOD']=='POST')
  {	  
		$n1=limpiar($_POST["n1"]);
		$n2=limpiar($_POST["n2"]);
		$operador=limpiar($_POST["operacion"]);

		switch($operador){//no puedde ir antes de recoger el dato
		case "Suma":
			$simbolo = "+";//lo pilla como texto asique no me deja realizar la operacion directamente
			$operacion= $n1+$n2;
			break;
		case "Resta":
			$simbolo = "-";
			$operacion= $n1-$n2;
			break;
		case "Producto":
			$simbolo = "*";
			$operacion= $n1*$n2;
			break;
		case "División":
			$simbolo = "/";	
			$operacion= $n1/$n2;
			break;		
	}
  		$resultado= $n1 . " " . $simbolo . " " . $n2 . " = " . $operacion;//para escribir puedo concatenar con , pero para variables solo con .
	
   }
?>
<HTML>
<HEAD> <TITLE> FORMULARIO BASE </TITLE>

<style> 
form{
	width: 80%;
	border: 1px solid #a5a5a5 ;
	 margin: 40px auto;
	padding: 0 15px 15px;/*padding suberiro  a 0 porque quedaba un hueco */
	
}
h1 {
	text-align: center;
    font-size: 24px;
	background-color: #edf4fc;
	padding: 15px;
	margin: 0 -15px 20px; /*quito el margen para colorear */
}
input[type="number"] {
            width: 100%;
			border: 1px solid #a5a5a5 ;
			padding: 6px;
			margin: 6px;
			box-sizing: border-box;/*que no se salga del borde*/
}

input[type="submit"],
        input[type="reset"] {
            width: 48%;
            padding: 9px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
        }
input[type="submit"] {
            background-color: #287bd1;
            color: white;
}

input[type="reset"] {
            background-color: #e2e6ee;
}

.resultado{
	border: 1px solid green;
	border-radius:4px;
	background-color: #f3f8f0;
	text-align: center;
	color: green;
}
</style> 

</HEAD>
<BODY>

<form name='calculadora' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
<h1>CALCULADORA</h1>
<div class="resultado">
    <h3>Resultado de la operación:</h3>
    <?php echo $resultado; ?>
</div>
</FORM>


<form name='calculadora' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
<h1>CALCULADORA</h1>
Operando 1:<br>
<input type='number' name='n1' value=''><br>

Operando 2:<br>
<input type='number' name='n2' value=''><br>

Selecciona operacion :<BR>
<input type='radio' checked name='operacion' value='Suma'>Suma</br>
<input type='radio' name='operacion' value='Resta'>Resta</br>
<input type='radio' name='operacion' value='Producto'>Producto</br>
<input type='radio' name='operacion' value='División'>División</br>

<input type="submit" value="Enviar">
<input type="reset" value="Borrar">

<div class="resultado mt-7">
    <h3>Resultado de la operación:</h3>
    <?php echo $resultado; ?>
</div>
</FORM>
</BODY>
</HTML>

