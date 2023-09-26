<?php

//definere variabel med strong-tag
$fet_tekst = '<strong> Steen </strong> <?php echo "PHP kode" ?>';

/*
 * Funksjon for å fjerne HTML- og PHP-kode fra etternavnet
 * Vi får til dette ved å benytte oss av den innebygde funksjonen striptags().
 * Denne funksjonen er nyttig dersom en ikke ønsker at brukerinput skal endre nettsiden utenom det som er tiltenkt
 * I dette tilfellet er etternavnet først definert med <strong> tekst som hadde gjort etternavnet fet og litt php kode.
 * Ved å bruke striptags() fjernes disse attributten til teksten.
 */
function strip($fet_tekst){

    return strip_tags($fet_tekst);
}

//Skriver ut etternavnet og bruker funksjonen for å fjerne kodene
echo "Etternavnet " . strip($fet_tekst) . " har fått fjernet alt av HTML- og PHP-kode, og er ikke lenger skrevet med fet tekst.";

?>

<br>

