<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email validering</title>
</head>

<body>

    <?php

    class Validering
    {
        public static function validerEpost($epost)
        {
            // Bruk filter_var-funksjonen for å validere e-postadressen
            $gyldigEpost = filter_var($epost, FILTER_VALIDATE_EMAIL);

            // Returner resultatet av valideringen
            return $gyldigEpost !== false;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hent e-post fra skjemadata
        $epost = $_POST['epost'];

        // Valider e-postadressen
        $valideringsresultat = Validering::validerEpost($epost);
    } else {
        // Sett valideringsresultat til null hvis skjemaet ikke er sendt
        $valideringsresultat = null;
    }

    ?>

    <h2>Email validering</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="epost">Email:</label>
        <input type="text" name="epost" required>
        <input type="submit" value="Valider">
    </form>

    <?php
    // Vis valideringsresultatet
    if ($valideringsresultat !== null) {
        echo '<p>Resultat: Email er ' . ($valideringsresultat ? 'valid' : 'invalid') . '.</p>';
    }
    ?>

</body>

</html>