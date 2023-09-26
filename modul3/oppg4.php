<?php

// Associative array som mapper kommunenavn til fylker
$kommuneTilFylke = array(
    "Kristiansand" => "Agder",
    "Lillesand" => "Agder",
    "Birkenes" => "Agder",
    "Harstad" => "Troms og Finnmark",
    "Kvæfjord" => "Troms og Finnmark",
    "Tromsø" => "Troms og Finnmark",
    "Bergen" => "Vestland",
    "Trondheim" => "Trøndelag",
    "Bodø" => "Nordland",
    "Alta" => "Troms og Finnmark",
    "Porsgrunn" => "Vestfold og Telemark"
    
);
//match passer bedre her

// Funksjon for å finne og skrive ut fylket til en kommune
function finnFylke($kommune) {
    global $kommuneTilFylke;
     
    //sjekker om verdien i $kommune eksisterer i arrayen kommuneTilFylke
    //hvis kommunen har en lagret verdi så bir det skrevet ut 
    //om kommunen ikke er lagret blir andre beskjeden skrevet ut
    if (array_key_exists($kommune, $kommuneTilFylke)) {
        $fylke = $kommuneTilFylke[$kommune];
        echo "$kommune ligger i $fylke fylke";
    } else {
        echo "Vi fant ikke informasjon for $kommune";
    }
}

// Sjekk om kommunen er sendt inn via skjema
if(isset($_POST['kommune'])){
    $inputKommune = $_POST['kommune'];
    finnFylke($inputKommune);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Finn Fylke</title>
</head>
<body>
    <form method="post">
        <label for="kommune">Skriv inn kommunenavn:</label>
        <input type="text" name="kommune" id="kommune" required>
        <input type="submit" value="Finn Fylke">
    </form>
</body>
</html>
