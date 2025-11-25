<?php 

$data = array();
$vriendenkeer = readline("Hoe veel vrienden zal ik vragen om hun droom? \n");
for ($i = 0; $i < $vriendenkeer; $i++) {
    $namen = readline("Wat is jouw naam? \n");
    $data[$namen] = array();
    $vraagdromen = readline("Hoe veel dromen ga je opgeven? \n");
    for ($j = 0; $j < $vraagdromen; $j++) {
        $dromen = readline("Wat is jouw droom? \n");
        $data[$namen][] = $dromen;
    }
}
foreach ($data as $naam => $dromen) {
    foreach ($dromen as $droom) {
        echo $naam . " heeft dit als droom: " . $droom . "\n";
    }
    echo "\n";
}
?>