<?php
$sum = 0;


ob_implicit_flush(true); //Aktiver utskriftsbufring, dette må til for at scriptet skal utføre echo uten å vente på hele scriptet.
ob_end_flush(); //Slå av bufring, dette sikrer at all dataen blir sendt til nettleseren og ikke blir hengende igjen(bufrer)


// Tell fra 0 til 9 ved hjelp av en for-løkke
for ($i = 0; $i <= 9; $i++) {
    
    // Presenter tallet på skjermen med ett sekunds pause
    echo $i;
    sleep(1);

    // Legg til tallet i summen
    $sum += $i;

    // Tving frem linjeskift for hver iterasjon
    echo '<br>';
}
// Vent i to sekunder før du presenterer summen
sleep(2);

// Presenter summen
echo "Ferdig å telle! Summen av tallene ble $sum";


?>