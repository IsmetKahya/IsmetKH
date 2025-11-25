<?php

function getinput($argv, $argc)
{
    if ($argc < 2) {
        echo "Geen wisselgeld\n";
        throw new Exception("Error opgevangen: Verkkerde aantal argumenten. Roep de applicatie aan op de volgende manier:
`wisselgeld.php <bedrag>`\n");
    }
    return $argv[1];
}

function controlmoney($geld)
{
    try {
        if (!is_numeric($geld)) {
            throw new Exception("Error opgevangen: Input moet een valide getal zijn\n");
        }
        $geld = floatval($geld);

        if ($geld < 0) {
            throw new Exception("Error opgevangen: Input moet een positief getal zijn");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

    return $geld;
}

function geldwissel($geld) 
{
    define('GELD', [5000, 2000, 1000, 500, 200, 100, 50, 20, 10, 5]);
    define('WISSELGELD', ['50 Euro', '20 Euro', '10 Euro', '5 Euro', '2 Euro', '1 Euro', '50 Cent', '20 Cent', '10 Cent', '5 Cent']);

    $restbedrag = round($geld / 0.05) * 0.05;
    $restbedrag *= 100;

    foreach (GELD as $index => $unit) {
        if ($restbedrag >= $unit) {
            $count = floor($restbedrag / $unit);
            $restbedrag -= $count * $unit;
            echo "$count x " . WISSELGELD[$index] . "\n";
        }
    }
}

try {
    $input = getinput($argv, $argc);
    $geld = controlmoney($input);
    geldwissel($geld);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
