<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrering</title>
</head>

<body>

    <?php

    class Bruker
    {
        // Egenskaper
        public $fornavn;
        public $etternavn;
        public $brukernavn;
        public $fodselsdato;
        public $registreringsdato;

        // Konstruktør
        public function __construct($fornavn, $etternavn, $brukernavn, $fodselsdato)
        {
            $this->fornavn = $fornavn;
            $this->etternavn = $etternavn;
            $this->brukernavn = $brukernavn;
            $this->fodselsdato = $fodselsdato;
            $this->registreringsdato = date('Y-m-d H:i:s');
        }

        // Metode for å hente fullt navn
        public function hentFulltNavn()
        {
            return $this->fornavn . ' ' . $this->etternavn;
        }

        // Metode for å beregne alder basert på fødselsdato
        public function beregnAlder()
        {
            $fodselsdato = new DateTime($this->fodselsdato);
            $na = new DateTime('now');
            $alder = $na->diff($fodselsdato)->y;
            return $alder;
        }
    }

    // Underklasse JobbSoker
    class JobbSoker extends Bruker
    {
        // Ekstra egenskap for JobbSoker
        public $yrke;

        // Overstyring av hentFulltNavn-metoden
        public function hentInformasjon()
        {
            return $this->hentFulltNavn() . ', Yrke: ' . $this->yrke;
        }
    }

    // Sjekk om skjemaet er sendt
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hent skjemadata
        $first_name = $_POST['fornavn'];
        $last_name = $_POST['etternavn'];
        $username = $_POST['brukernavn'];
        $birthdate = $_POST['fodselsdato'];

        // Legg til håndtering av yrke
        $occupation = isset($_POST['yrke']) ? $_POST['yrke'] : '';

        // Opprett en ny JobbSoker-instans
        $newUser = new JobbSoker($first_name, $last_name, $username, $birthdate);
        $newUser->yrke = $occupation;

        // Vis brukerinformasjon ved hjelp av den overstyrte metoden
        echo '<h2>Brukerinfo</h2>';
        echo 'Informasjon: ' . $newUser->hentInformasjon() . '<br>';
        echo 'Alder: ' . $newUser->beregnAlder() . ' år<br>';
    } else {
        // Hvis skjemaet ikke er sendt, vis registreringsskjemaet
    ?>

        <h2>Registrering</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fornavn">Fornavn:</label>
            <input type="text" name="fornavn" required><br>

            <label for="etternavn">Etternavn:</label>
            <input type="text" name "etternavn" required><br>

            <label for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" required><br>

            <label for="fodselsdato">Fødselsdato:</label>
            <input type="date" name="fodselsdato" required><br>

            <label for="yrke">Yrke:</label>
            <input type="text" name="yrke"><br>

            <input type="submit" value="Registrer">
        </form>

    <?php
    }

    ?>

</body>

</html>
