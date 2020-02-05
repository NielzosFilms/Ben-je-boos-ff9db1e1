<?php

$positieveWoorden = convertFileToArray("positive-words.txt");
$neutraleWoorden = convertFileToArray("neutral-words.txt");
$negatieveWoorden = convertFileToArray("negative-words.txt");
$lyrics = file_get_contents("lyrics.txt");
$lyrics = str_replace("\n", " ", $lyrics);
$lyrics = explode(" ", $lyrics);

function convertFileToArray($file) {
    $array = file_get_contents($file);
    $array = explode("\n", $array);
    return $array;
}

$positieveWoorden;
$neutraleWoorden;
$negatieveWoorden;
$lyrics;

$positieveWoorden_count = 0;
$neutraleWoorden_count = 0;
$negatieveWoorden_count = 0;

foreach($lyrics as $woord){
    if(in_array($woord, $positieveWoorden)) $positieveWoorden_count++;
    if(in_array($woord, $neutraleWoorden)) $neutraleWoorden_count++;
    if(in_array($woord, $negatieveWoorden)) $negatieveWoorden_count++;
}

$sentiment = ($neutraleWoorden_count + $positieveWoorden_count - $negatieveWoorden_count) / $neutraleWoorden_count;

echo("Positieve woorden: ".$positieveWoorden_count.PHP_EOL);
echo("Neutrale woorden: ".$neutraleWoorden_count.PHP_EOL);
echo("Negatieve woorden: ".$negatieveWoorden_count.PHP_EOL);
echo("Het sentiment van de tekst krijgt een score van: ".round($sentiment,2));


