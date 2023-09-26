<!DOCTYPE html>

<body>
    <h1>Sparing Kalkulator</h1>


    <?php

    //Definere variabler for 
    $S0 = 1000;

    
    $rente = 1.25;

    //variabel for hvor mange år 
    $nÅr = 10;
    //Variabel for å regne ut hva avkastningen blir
    $regn = ($S0 * $rente) /100;

    //Variabel for å legge sammen tidligere saldo og avkasnting
    $S1 = $S0 + $regn;

    echo "Saldo er: " . $S0 . " Med rente på " . $rente . " Så blir saldoen etter ett år: " . $S1 . "<br>";

    echo "<br>Saldoen utvikler seg slik utover årene: ";

    //for loop som itererer antallet $nÅr
    for ($i = 1; $i <= $nÅr; $i++) {

        //Må definere ny variabel for å regne her for å få riktig beløp
        $Sn = ($S0 * $rente) /100;
        //Legger til avkastning i saldoen
        $S0 += $Sn;
        //Printer ut ny saldo for hvert år og runder opp desimalene opp til 2 desimaler
        echo "<br>S" . $i . "= " . round($S0,2) . "<br>";

    }





    ?>

   
</body>
</html>
