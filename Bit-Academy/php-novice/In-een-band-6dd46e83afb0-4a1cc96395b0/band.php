<?php 

$totalprijs = 0;
$albums = [
    "Citizen of Glass" => 4.5,
    "Night" => 9,
    "New Eyes Kost" => 5,
    "Strange Trails" => 10,
];

foreach ($albums as $album => $prijs) {
    echo $album . " Kost €" . $prijs . "\n";
    $totalprijs += $prijs;
}
$gemiddeldeprijs = $totalprijs / count($albums);
echo "Het totaalbedrag van alle albums is €$totalprijs\n";
echo "De gemiddelde prijs van alle albums is €$gemiddeldeprijs"


?>