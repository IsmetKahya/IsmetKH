<?php 

$tijd = $argv[1];
if (substr($tijd, -1) == "d") {
    $tijd = substr($tijd, 0, -1);
    echo $tijd * 24 * 60 * 60 . " seconden";
} else if (substr($tijd, -1) === "u") {
    $tijd = substr($tijd, 0, -1);
    echo $tijd * 60 * 60 . " seconden";
} else if (substr($tijd, -1) === "m") {
    $tijd = substr($tijd, 0, -1);
    echo $tijd * 60 . " seconden";
} else if (substr($tijd, -1) === "s") {
    $tijd = substr($tijd, 0, -1);
    echo $tijd . " seconden";
}


?>