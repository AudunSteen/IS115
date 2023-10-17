

<?php

//forskjellen på include og require i php 
//eksempel på include og require 
/*
include("eksternfil.php");
echo "Skriptet fortsetter å kjøre selv om eksternfil.php ikke ble funnet.";


require("eksternfil.php");
echo "Dette vil aldri bli nådd hvis eksternfil.php ikke ble funnet.";


//dersom det ikke re funksjoner for de metodene du har lyst tuk eller trenger 
//dersom du lager egne funksjoner så kan disse legges inn med include funksjonen 



// minFunksjon.php

function velkommen($navn) {
    echo "Velkommen, $navn!";
}

function areal($r)
{
    echo pi() * pow($r, 2);
    return round(pi() * pow($r, 2), 2);

}



//innholdet i funksjonen blir ikke endret av selve funksjonen 
//passer ikke alltid når vi inner vårt funksjon 
$radius = 7;
echo areal(); 

// annetSkript.php

// Inkluderer minFunksjon.php
include("minFunksjon.php");

// Bruker funksjonen
$navn = "John";
velkommen($navn);
*/


//dynamisk antall parametere 

function omsetning()
{
    if (!func_num_args())
    {
        return "ingen omsetning";
    }
    else
    {
        $omsetning = array_sum(func_get_args());
        return "omsetning: kr. " . number_format($omsetning, 2, ",", " ");
    }
}

echo omsetning(999, 777, 123);

function beregnGjennomsnitt() {
    $antall_argumenter = func_num_args();

    if ($antall_argumenter === 0) {
        return "Ingen tall er gitt for å beregne gjennomsnittet." . $gjennomsnitt;
    }

    $sum = 0;
    foreach (func_get_args() as $tall) {
        $sum += $tall;
    }

    $gjennomsnitt = $sum / $antall_argumenter;
    return $gjennomsnitt;
}

// Eksempel på bruk av funksjonen
$tall1 = 1000;
$tall2 = 775;
$tall3 = 888;
$tall4 = 189;

$gjennomsnitt = beregnGjennomsnitt($tall1, $tall2, $tall3, $tall4);
echo "Gjennomsnittet av tallene er: " . $gjennomsnitt;




?>