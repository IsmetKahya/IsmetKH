<?php

if ($argc < 2) {
    echo "Geen wisselgeld\n";
    exit;
}

$geld = floatval($argv[1]);

if (!is_numeric($geld) || $geld < 0) {
    echo "Geen wisselgeld\n";
    exit;
}

define('GELD', [5000, 2000, 1000, 500, 200, 100, 50, 20, 10, 5]);
define('WISSELGELD', ['50 Euro', '20 Euro', '10 Euro', '5 Euro', '2 Euro', '1 Euro', '50 Cent', '20 Cent', '10 Cent', '5 Cent']);
$restbedrag = $geld * 100;

foreach (GELD as $index => $unit) {
    if ($restbedrag >= $unit) {
        $count = floor($restbedrag / $unit);
        $restbedrag -= $count * $unit;
        echo "$count x " . WISSELGELD[$index] . "\n";
    }
}
?>
