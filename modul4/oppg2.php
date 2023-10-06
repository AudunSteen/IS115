<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering av ny bruker</title>
</head>
<body>
    <h1>Registrering av ny bruker</h1>
    <form method="post" action="registrer.php">
        <label for="navn">Navn:</label>
        <input type="text" id="navn" name="navn" required><br><br>
        
        <label for="mobilnummer">Mobilnummer:</label>
        <input type="text" id="mobilnummer" name="mobilnummer" required pattern="[0-9]{8}"><br><br>
        
        <label for="epost">E-post:</label>
        <input type="email" id="epost" name="epost" required><br><br>
        
        <input type="submit" value="Registrer">
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent og valider data fra skjemaet
    $navn = $_POST["navn"];
    $mobilnummer = $_POST["mobilnummer"];
    $epost = $_POST["epost"];

    $feilMeldinger = array();

    // Valider navn (kun bokstaver og mellomrom tillatt)
    if (!preg_match("/^[a-zA-Z ]+$/", $navn)) {
        $feilMeldinger[] = "Navnet kan bare inneholde bokstaver og mellomrom.";
    }

    // Valider mobilnummer (8 sifre)
    if (!preg_match("/^[0-9]{8}$/", $mobilnummer)) {
        $feilMeldinger[] = "Mobilnummeret må være 8 sifre.";
    }

    // Valider e-post
    if (!filter_var($epost, FILTER_VALIDATE_EMAIL)) {
        $feilMeldinger[] = "Ugyldig e-postadresse.";
    }

    // Hvis ingen valideringsfeil oppstår, lagre data
    if (empty($feilMeldinger)) {
        // Lagre data i en matrise (normalt ville du lagret dette i en database)
        $nyBruker = array(
            "Navn" => $navn,
            "Mobilnummer" => $mobilnummer,
            "E-post" => $epost
        );

        // Skriv ut bekreftelsesmelding
        echo "<h2>Ny bruker er registrert:</h2>";
        echo "<pre>";
        print_r($nyBruker);
        echo "</pre>";
    } else {
        // Hvis det er valideringsfeil, vis feilmeldinger
        echo "<h2>Feil ved registrering:</h2>";
        foreach ($feilMeldinger as $feilmelding) {
            echo "<p>$feilmelding</p>";
        }
    }
}
?>
