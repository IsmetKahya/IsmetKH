<?php 

$mensen = readline("Hoe veel vrienden zal ik vragen om hun droom? \n");
if (is_numeric($mensen)) {
    $antwoorden = [];
    for ($i = 0; $i < $mensen; $i++) {
        $naam = readline("Wat is jouw naam? \n");
        $antwoord = readline("Wat is jouw droom? \n");
        $antwoorden[$naam][] = $antwoord; 
    }
    foreach ($antwoorden as $naam => $dromen) {
        foreach ($dromen as $droom) {
            echo "$naam heeft dit als droom: $droom\n";
        } 
    }
} else {
    echo"'$mensen' is geen getal, probeer het opnieuw";
}




?>