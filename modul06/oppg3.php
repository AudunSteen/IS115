<?php

class Bruker
{
    // endret tilgangsnivå fra public til protected 
    protected $fornavn;
    protected $etternavn;
    protected $brukernavn;
    protected $fodselsdato;
    protected $registreringsdato;

    // Array for lagring av slettede brukernavn
    protected static $slettedeBrukernavn = [];

    // Konstruktør
    public function __construct($fornavn, $etternavn, $fodselsdato)
    {
        $this->fornavn = $fornavn;
        $this->etternavn = $etternavn;
        $this->fodselsdato = $fodselsdato;

        // Generer brukernavn tilfeldig
        $this->genererBrukernavn();

        // Lagre registreringsdato automatisk
        $this->registreringsdato = date('Y-m-d H:i:s');
    }

    // Metode for å generere brukernavn tilfeldig
    protected function genererBrukernavn()
    {
        // Implementer logikk for å generere et tilfeldig brukernavn
        $this->brukernavn = strtolower(substr($this->fornavn, 0, 1) . $this->etternavn . rand(100, 999));
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

    // Destruktor for å lagre brukernavnene til slettede brukere i en matrise
    public function __destruct()
    {
        self::$slettedeBrukernavn[] = $this->brukernavn;
    }

    // Metode for å hente slettede brukernavn og gi tilgang til matrisen 
    public static function hentSlettedeBrukernavn()
    {
        return self::$slettedeBrukernavn;
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

// Opprett to objekter basert på JobbSoker-klassen
$jobbSoker1 = new JobbSoker('Audun', 'Steen', '2000-03-12');
$jobbSoker1->yrke = 'Forskningsassistent';

$jobbSoker2 = new JobbSoker('Mac', 'Demarco', '1949-10-16');
$jobbSoker2->yrke = 'Musiker';

// Kjør metoden som viser informasjon for begge brukerne
echo '<h2>Brukerinfo</h2>';
echo 'Informasjon for bruker 1: ' . $jobbSoker1->hentInformasjon() . '<br>';
echo 'Informasjon for bruker 2: ' . $jobbSoker2->hentInformasjon() . '<br>';

// Sletter begge objektene
unset($jobbSoker1);
unset($jobbSoker2);

// Skriv ut slettede brukernavn
echo '<h2>Slettede brukernavn</h2>';
$slettedeBrukernavn = Bruker::hentSlettedeBrukernavn();
foreach ($slettedeBrukernavn as $brukernavn) {
    echo $brukernavn . '<br>';
}

?>
