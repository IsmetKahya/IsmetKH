<?php

if ($argc < 2) {
    echo "Geen wisselgeld\n";
    exit;
}

$geld = intval($argv[1]);

if (!is_numeric($geld) || $geld < 0) {
    echo "Geen wisselgeld\n";
    exit;
}

define('GELD', [50, 20, 10, 5, 2, 1]);

$restbedrag = $geld;

foreach (GELD as $unit) {
    if ($restbedrag >= $unit) {
        $count = floor($restbedrag / $unit);
        $restbedrag %= $unit;
        echo "$count x $unit euro\n";
    }
}
?>
