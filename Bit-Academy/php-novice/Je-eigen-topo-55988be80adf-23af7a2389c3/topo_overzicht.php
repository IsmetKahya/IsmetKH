<?php 

$arrayvandata = [];
$hoeveel = readline("Hoe veel ga je toevoegen? \n");
if (is_numeric($hoeveel)) {
    for ($i = 0; $i < $hoeveel; $i++) {
        $landen = readline("Welk land wil je toevoegen? \n");
        $hoofdstaden = readline("Wat is hoofdstad van $landen? ");
        $arrayvandata[$landen] = $hoofdstaden;
    }
    echo"De volgende landen en steden zitten in de database: \n";
    foreach ($arrayvandata as $land => $hoofdstad) {
        echo ucwords($land) . ", " . ucwords($hoofdstad) . "\n";
    }
} else {
    echo "$hoeveel is geen getal!!";
}



?>