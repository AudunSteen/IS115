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

        // Konstruktør som opretter nye objekter i bruker 
        public function __construct($fornavn, $etternavn, $brukernavn, $fodselsdato)
        {
            $this->fornavn = $fornavn;
            $this->etternavn = $etternavn;
            $this->brukernavn = $brukernavn;
            $this->fodselsdato = $fodselsdato;
            // Setter registreringsdato til gjeldende dato og klokkeslett
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

    // Sjekk om skjemaet er sendt
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hent skjemadata
        $fornavn = $_POST['fornavn'];
        $etternavn = $_POST['etternavn'];
        $brukernavn = $_POST['brukernavn'];
        $fodselsdato = $_POST['fodselsdato'];

        // Opprett en ny Bruker-instans
        $nyBruker = new Bruker($fornavn, $etternavn, $brukernavn, $fodselsdato);

        // Vis brukerinformasjon
        //viser alder, navn og registreingsdato 
        echo '<h2>Brukerinfo</h2>';
        echo 'Fullt navn: ' . $nyBruker->hentFulltNavn() . '<br>';
        echo 'Alder: ' . $nyBruker->beregnAlder() . ' år<br>';
        echo 'Registrerings dato: ' . $nyBruker->registreringsdato . '<br>';
    } else {
        // Hvis skjemaet ikke er sendt, vis registreringsskjemaet
    ?>

        <h2>Registrering</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fornavn">Fornavn:</label>
            <input type="text" name="fornavn" required><br>

            <label for="etternavn">Etternavn:</label>
            <input type="text" name="etternavn" required><br>

            <label for="brukernavn">Brukernavn:</label>
            <input type="text" name="brukernavn" required><br>

            <label for="fodselsdato">Fødselsdag:</label>
            <input type="date" name="fodselsdato" required><br>

            <input type="submit" value="Registrer">
        </form>

    <?php
    }

    ?>

</body>

</html>
