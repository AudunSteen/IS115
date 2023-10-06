<?php

// Opprett en matrise med nøkler 0, 3, 5, 7, 8 og 15
$matrise = array(
    0 => "Verdi for nøkkel 0",
    3 => "Verdi for nøkkel 3",
    5 => "Verdi for nøkkel 5",
    7 => "Verdi for nøkkel 7",
    8 => "Verdi for nøkkel 8",
    15 => "Verdi for nøkkel 15"
);

// Skriv ut matrisen med print_r() funksjonen
echo "Matrise skrevet ut med print_r():<br>";
echo nl2br(print_r($matrise, true));

// Skriv ut matrisen ved hjelp av en løkke med <br> for å lage nye linjer
echo "<br><br>Matrise skrevet ut med en løkke:<br>";
foreach ($matrise as $nokkel => $verdi) {
    echo "Nøkkel: " . $nokkel . ", Innhold: " . $verdi . "<br>";
}

?>
