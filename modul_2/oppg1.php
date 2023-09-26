<?php

//matriser og skjemabehandling som betyr array 
//eksempel på vanlig array 
/*
$matrise = array(
array(1, 2, 3,), 
array (4, 5, 6, ),
array (7, 8, 9,)


); 

echo $matrise [0][0]; 
echo $matrise [1][1];



$tall = array(1, 4, 6, 9);
$tall = [1, 4, 6, 9];


echo $tall[0] . "<br>"; 

$tall = array(=> 9 "audun", "eirik", "tole", "isak");
//1 blir på plass 1, 4 på 2, 6 på 3 og 9 
// endre til en spesifik plass i listen med => 5 før variablen 


$lodd = array(); // Opprett en tom array for loddnumrene

echo "Dine lodd er ";
for ($i = 1; $i <= 5; $i++) {
    $dette_lodd = rand(1, 100); // Generer et tilfeldig loddnummer mellom 1 og 100
    $lodd[] = $dette_lodd; // Legg til loddnummeret i arrayen
    echo $dette_lodd . " "; // Skriv ut loddnummeret
}

sort($lodd); // Sorter loddene i stigende rekkefølge
echo "<br>Dine lodd (sortert): ";
print_r($lodd); // Skriv ut loddene etter sortering

$vinnerlodd = rand(1, 100); // Generer et tilfeldig vinnerloddnummer mellom 1 og 100
if (in_array($vinnerlodd, $lodd)) {
    echo "<br><br>Du vant med lodd nummer <strong>" . $vinnerlodd . "</strong>!!!"; // Hvis vinnerloddet er i spillerens lodd
} else {
    echo "<br><br>Vinnerloddet ble <strong>" . $vinnerlodd . "</strong>. Beklager, ingen gevinst!"; // Hvis vinnerloddet ikke er i spillerens lodd
}
*/


//oppgave nr 2 

$deltaker = array( 
    "navn" => "Optimus Prime screams: ",
    "Callout" => "Autobots, roll out!",
    "Teammate" => "Bumblebee",
    ); 




    foreach ($deltaker as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }
//for each løkke som itererer gjennom $deltaker
// for løkke går kun gjennom numeriske veridier 

?>



