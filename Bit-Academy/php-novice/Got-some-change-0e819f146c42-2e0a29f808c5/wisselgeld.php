<?php 

$geld = intval($argv[1]);
if ($geld < 1 || !is_numeric($geld)) {
    echo "Geen wisselgeld";
} else {
    echo "" . $geld . " x 1 euro";
}




?>