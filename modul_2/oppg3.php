<?php

// Definer en funksjon kalt erGyldigEpost som tar imot en e-postadresse som parameter
function erGyldigEpost($epost) {
    // Fjern eventuelle mellomrom fra begynnelsen og slutten av e-posten
    $epost = trim($epost);

    //Innebygd PHP-funksjon (filter_var) for å validere e-postadressen
    if (filter_var($epost, FILTER_VALIDATE_EMAIL)) {
        return true; // Hvis e-postadressen er gyldig, returner true (sann)
    } else {
        return false; // Hvis e-postadressen er ugyldig, returner false (usann)
    }
}

// Test funksjonen med en test-e-postadresse
$testEpost = "audstuia.no";
if (erGyldigEpost($testEpost)) {
    echo "E-postadressen er gyldig."; // Hvis funksjonen returnerer true, vis denne meldingen
} else {
    echo "E-postadressen er ugyldig."; // Hvis funksjonen returnerer false, vis denne meldingen
}

?>
