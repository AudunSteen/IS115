


<!DOCTYPE html>
<html>
<head>
    <p>Discord navn er Audun. </p>
        
    <p> 
        Brukernavn: donaudsteen </p>
    </head>

<body>
    
</body>
</html>
<?php

//Definere etternavnet vi skal teste
$etternavn = "hAnEsTaD";

/*
 * Funksjon for å endre navn
 * Tar variabel $etternavn som parameter og bruker de innebygde funksjonene
 * ucfirst() og strtolower() for å omgjøre bokstavene i strengen.
 * De gjør at den første bokstaven blir uppercase og resten blir lowercase
 */
function endreEtternavn($etternavn){

    $etternavn = ucfirst(strtolower($etternavn));

    return $etternavn;

}

//Kaller funksjonen og endrer etternavnet
echo endreEtternavn($etternavn);

//Lager setning med det endrede etternavnet og sjekker hvor langt det er
echo "<br>Etternavnet er " . strlen($etternavn) . " tegn langt";

?>

<br>

<?php echo '<a href="../modul2/index.php">Tilbake til startside</a>';
