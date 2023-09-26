
<h1>Vekt av korn på sjakkbrett</h1>
<?php

//definere variabler
// 64 ruter i sjakkbrett
$brett = 64;

$antKorn = 1;
//vekt av korn
$totalVekt = 0.035;

// for loop som går gjennom hver rute av sjakkbrettet (64)

for ($i = 1; $i <= $brett; $i++) {

    //regner ut vekt av korn. Gram til tonn er 1000000
    $vektKorn = $antKorn * $totalVekt /1000000;

    //printer ut hvilken rute man er på, antall korn ved hver rute og vekten deres
    echo "Ved rute " . $i . " så er det " . $antKorn . " korn. De veier " . $vektKorn . " tonn<br>";

    //Ganger det antallet med korn som var på forrige rute med to slik at det øker med seg selv
    //Skriver den etter setningen blir skrevet ut slik at vi starter på 1 korn på rute 1.
    $antKorn *= 2;

}

//Ganger antall korn og vekt med seg selv for å få total vekt og antall.
echo " totale vekten : " . $antKorn * 2 . "   totale vekten  i tonn : " , $vektKorn * 2;


?>