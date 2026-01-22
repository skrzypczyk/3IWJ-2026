<?php
// Afficher les X premiers nombres premiers
// Utilisation de boucles et d'une fonction


function isPrime($number){
    if($number<2){
        return false;
    }
    for($i=2; $i <= sqrt($number); $i++){
        if($number%$i == 0){
            return false;
        }
    }
    return true;
}

function showPrimes($x){
    $cpt = 2;
    while($x>0){
        if(isPrime($cpt)){
            $x--;
            echo "<li>".$cpt;
        }
        $cpt++;
    }
}

showPrimes(100);

