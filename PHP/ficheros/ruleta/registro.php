<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ruleta</title>
  </head>

  <body>
  <?php
    require_once "media7fun.php";


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dniReg=$_POST["dniReg"];
        $nomReg=$_POST["nomReg"];
        $ap1Reg=$_POST["ap1Reg"];
        $ap2Reg=$_POST["ap2Reg"];
        $fechaReg=$_POST["fechaReg"];
        $aliasReg=$_POST["aliasReg"];
        $saldoReg=$_POST["saldoReg"];
   
    }
        ?>
  </body>
</html>