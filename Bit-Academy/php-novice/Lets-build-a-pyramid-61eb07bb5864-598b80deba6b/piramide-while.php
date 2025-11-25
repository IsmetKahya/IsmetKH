<?php

$stapels = readline("Hoe veel stapels wil je hebben? ");
$i = 1;


while ($i <= $stapels) {
    $j = 1; 
    while ($j <= $i) {        
        $j++;
        echo "*";
    }
        echo "\n";
        $i++;
}




?>