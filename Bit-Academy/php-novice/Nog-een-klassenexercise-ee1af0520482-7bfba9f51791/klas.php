<?php 

$studenten = readline("Wie zit er in de klas? ");
$studenten = explode(" ", $studenten);
echo "De studenten in de klas zijn:\n";
foreach ($studenten as $student) {
    echo"$student\n";
}




?>