<?php

if ($argc < 2) {
    echo "Geen wisselgeld\n";
    exit;
}
$geld = intval($argv[1]);
$tieneuro = 0;
$vijfeuro = 0;
$twee_euro = 0;
$eeneuro = 0;
if (!is_numeric($geld) || $geld < 0) {
        echo "Geen wisselgeld\n";
        exit;
} else {
    if ($geld >= 10) {
        $tieneuro = floor($geld / 10);
        $geld = $geld % 10;
    }


    if ($geld >= 5) {
        $vijfeuro = floor($geld / 5);
        $geld = $geld % 5;
    }

    if ($geld >= 2) {
        $twee_euro = floor($geld / 2);
        $geld = $geld % 2;
    }

    if ($geld >= 1) {
        $eeneuro = $geld;
        $geld = 0;
    }

    if ($tieneuro > 0) {
        echo "$tieneuro x 10 euro\n";
    }
    if ($vijfeuro > 0) {
        echo "$vijfeuro x 5 euro\n";
    }
    if ($twee_euro > 0) {
        echo "$twee_euro x 2 euro\n";
    }
    if ($eeneuro > 0) {
        echo "$eeneuro x 1 euro\n";
    }
}
?>
