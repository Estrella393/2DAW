
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bingo</title>
    <link rel="stylesheet" href="style.css">
</head>

<h1>BINGO</h1>


    <div class="bombo"><!--incluye la imagen y el boton -->
        <h2>Bombo</h2>

        <div class="bola"><!-- div de las imagenes -->
            <img src="imges/<?php echo $bola; ?>.png">
        </div>
        <button>
            Sacar bola
        </button>
    </div>


    <h2>Cartones</h2>
    <div class="cartones"><!-- div de los cartones  -->
    </div>


</body>

</html>

<body>