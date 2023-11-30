<?php

class Validering
{
    // En PHP-klasse for validering av ulike typer data

    public static function validerEpost($epost)
    {
        // Metode for å validere e-postadresser
        $gyldigEpost = filter_var($epost, FILTER_VALIDATE_EMAIL);

        // Returnerer true hvis e-postadressen er gyldig, ellers false
        return $gyldigEpost !== false;
    }

    public static function validerPassord($passord)
    {
        // Metode for å validere passord med spesifikke krav
        // Passordkrav: minst én stor bokstav, minst to tall, minst ett spesialtegn, minimum ni tegn
        return preg_match('/^(?=.*[A-Z])(?=.*\d.*\d)(?=.*[!@#$%^&*()-_+=])[A-Za-z\d!@#$%^&*()-_+=]{9,}$/', $passord);
    }

    public static function validerMobilnummer($mobilnummer)
    {
        // Metode for å validere norske mobilnumre
        // Mobilnummerkrav: gyldig norsk mobilnummer
        return preg_match('/^(\+47|0047|47)?[4&9]\d{7}$/', $mobilnummer);
    }

    public static function validerInputType($input, $type)
    {
        // Metode for å validere inndata basert på en gitt type
        // Bruker en switch-case for å velge riktig valideringsmetode basert på "type"
        switch ($type) {
            case 'epost':
                return self::validerEpost($input);
            case 'passord':
                return self::validerPassord($input);
            case 'mobilnummer':
                return self::validerMobilnummer($input);
            default:
                return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Henter inndata fra skjemadata
    $input = $_POST['input'];
    $type = $_POST['type'];

    // Validerer inndata basert på "type" ved hjelp av Validering-klassen
    $valideringsresultat = Validering::validerInputType($input, $type);
} else {
    // Setter valideringsresultat til null hvis skjemaet ikke er sendt
    $valideringsresultat = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validering</title>
</head>

<body>

    <h2>Validering</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="input">Legg til verdi:</label>
        <input type="text" name="input" required>

        <label for="type">Velg type verdi:</label>
        <select name="type" required>
            <option value="epost">E-post</option>
            <option value="passord">Passord</option>
            <option value="mobilnummer">Mobilnummer</option>
        </select>

        <input type="submit" value="Valider">
    </form>

    <?php
    // Viser valideringsresultatet etter innsending av skjemaet
    if ($valideringsresultat !== null) {
        echo '<p>Resultat: Verdi er ' . ($valideringsresultat ? 'gyldig' : 'ugyldig') . '.</p>';
    }
    ?>

</body>

</html>
