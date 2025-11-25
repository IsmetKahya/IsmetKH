<?php 

$stapels = readline("Hoe veel stapels wil je hebben? ");
$i = 1;


while ($i <= $stapels) {
        $string = "";
        $string .= str_repeat("*", $i);
        echo $string . "\n";
        $i++;
}



?>