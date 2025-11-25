<?php 

$activiteiten = readline("Hoe veel activiteiten wil je toevoegen? \n\n");
if (is_numeric($activiteiten)) {
    $antwoorden = [];
    for ($i = 0; $i < $activiteiten; $i++) {
        "Wat wil je toevoegen aan je bucket list? \n";
        $antwoord = readline("Wat wil je toevoegen aan je bucket list? \n");
        $antwoorden[] = $antwoord; 
    }
        echo "Op jouw bucket list staat:\n";
    foreach ($antwoorden as $list) {
        echo "$list\n";
    }
} else {
    echo"'$activiteiten' is geen getal, probeer het opnieuw";
}




?>