<?php

function boodschappenlijst()
{
    $list = array();
    $product = readline("Wat wil je aan je boodschappenijst toevoegen? \n");
    array_push($list, $product);
    foreach ($list as $product) {
        echo "Jouw boodschappenlijst bevat nu:\n" . implode(", ", $list) . "\n";
    }
    echo "Bedankt voor het gebruik van de boodschappenlijst!\n";
    while (readline("Wil je meer producten toevoegen? (y/n) \n") === "y") {
        $product = readline("Wat wil je aan je boodschappenlijst toevoegen? \n");
        array_push($list, $product);
        echo "Jouw boodschappenlijst bevat nu:\n" . implode("\n", $list) . "\n";
    }
}
boodschappenlijst();
?>
