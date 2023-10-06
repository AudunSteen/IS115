<?php


// Eksisterende brukerinformasjon i en matrise
$brukerInformasjon = [
    "navn" => "Audun Steen",
    "mobilnummer" => "95122569",
    "epost" => "audunste@uia.no"
];

// Initialiser variabler for feilmeldinger og brukerdata
$errors = [];
$userData = [];

// Sjekk om skjemaet er sendt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider navn
    if (empty($_POST["navn"])) {
        $errors[] = "Navn er påkrevd din kuse";
    } else {
        $userData["navn"] = $_POST["navn"];
    }

    // Valider mobilnummer
    if (empty($_POST["mobilnummer"])) {
        $errors[] = "Mobilnummer er påkrevd din hore";
    } elseif (!preg_match("/^\d{8}$/", $_POST["mobilnummer"])) {
        $errors[] = "Ugyldig mobilnummer. Vennligst bruk 8 siffer.";
    } else {
        $userData["mobilnummer"] = $_POST["mobilnummer"];
    }

    // Valider e-postadresse
    if (empty($_POST["epost"])) {
        $errors[] = "E-post er påkrevd din skittene slut";
    } elseif (!filter_var($_POST["epost"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ugyldig e-postadresse";
    } else {
        $userData["epost"] = $_POST["epost"];
    }

    // Sjekk om det er endringer og lagre dem hvis det er tilfelle
    if (empty($errors)) {
        $endringer = false;

        foreach ($userData as $felt => $verdi) {
            if ($brukerInformasjon[$felt] != $verdi) {
                $brukerInformasjon[$felt] = $verdi;
                $endringer = true;
            }
        }

        if ($endringer) {
            echo "<p>Brukeroppføringen er endret.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Brukerprofil</title>
</head>
<body>
    <h1>Brukerprofil</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="navn">Navn:</label>
        <input type="text" id="navn" name="navn" value="<?php echo $brukerInformasjon["navn"]; ?>" required><br>

        <label for="mobilnummer">Mobilnummer:</label>
        <input type="text" id="mobilnummer" name="mobilnummer" value="<?php echo $brukerInformasjon["mobilnummer"]; ?>" required><br>

        <label for="epost">E-post:</label>
        <input type="text" id="epost" name="epost" value="<?php echo $brukerInformasjon["epost"]; ?>" required><br>

        <input type="submit" value="Oppdater">
    </form>
</body>
</html>
