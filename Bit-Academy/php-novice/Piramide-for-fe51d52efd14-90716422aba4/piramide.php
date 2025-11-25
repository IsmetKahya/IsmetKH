<?php

$stapels = readline("Hoe veel stapels wil je hebben? ");

for ($i = 1; $i <= $stapels; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}

?>
