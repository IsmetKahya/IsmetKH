<?php 

$argv;
if ($argc < 2) {
    echo "Fout: Er zijn geen argumenten meegegeven.\n";
    exit(1);
}
$totaltijd = 0;

foreach (array_slice($argv, 1) as $arg) {
    $harf = substr($arg, -1);
    $nummer = substr($arg, 0, -1);
    switch ($harf) {
        case "d":
            $totaltijd += $nummer * 24 * 60 * 60;
            break;
        case "u":
            $totaltijd += $nummer * 60 * 60;
            break;
        case "m":
            $totaltijd += $nummer * 60;
            break;
        case "s":
            $totaltijd += $nummer;
            break;
    }
}
echo "De totale tijd is $totaltijd seconden.";


?>