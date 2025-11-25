<?php 

$antwoorden = [
    'Japan' => 'Tokyo',
    'Mexico' => 'Mexico-Stad',
    'de Verenigde Staten' => 'Washington D.C.',
    'India' => 'New Delhi',
    'Zuid-Korea' => 'Seoul',
    'China' => 'Peking',
    'Nigeria' => 'Abuja',
    'Argentinië' => 'Buenos Aires',
    'Egypte' => 'Cairo',
    'Engeland' => 'Londen',
];
$correct = 0;
$vraglist = 0;
foreach ($antwoorden as $antwoord => $hoofstad) {
    $vragen = readline("What is the capital of $antwoord\n");
    $vraglist++;
    if (strtolower($vragen) == strtolower($hoofstad)) {
        echo "Correct!\n";
        $correct++;
    } else {
        echo "Helaas, $vragen is not the capital of $antwoord\n";
        echo "The correct answer is: $hoofstad\n";
    }
}
echo"You have guessed $correct van de $vraglist goed";




?>