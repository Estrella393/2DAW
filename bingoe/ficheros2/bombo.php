
<?php
function bombo(){
    $bolasSacadas = array();
   
   while(count($bolasSacadas) < 60){
        $bola = rand(1, 60);


        if(!in_array($bola, $bolasSacadas)){
            $bolasSacadas[] = $bola;
        }
    }
    return $bolasSacadas;
}
?>