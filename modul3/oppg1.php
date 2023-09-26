<!DOCTYPE html>
<html>
<head>
    <title>Stillingsannonse</title>
</head>
<body>
    <h1>Stillingsannonse</h1>
    <h2>Systemutvikler søkes innen 15/09/23</h2>

    <?php
    $annonseUtløpsdato = "2023-12-15"; // 
    //$annonseUtløpsdato: variabel som inneholder datoen jobbannonsens utløpsdato 

    $dagensDato = date("Y-m-d");
    //date("Y-m-d") formaterer datoen som "ÅÅÅÅ-MM-DD"

    //If sjekker om dagensdato er større enn annonseutløpsdata
    //isset sjekker om søk knappen er trykket på
    if (isset($_POST['søk'])) {
        if ($dagensDato > $annonseUtløpsdato) {
            echo "Stillingsannonsen som systemutvikler er dessverre stengt. <br>";
            echo "Den stengte 15-09-23";
        } else {
            echo "Stillingsannonsen som systemutvikler er fortsatt åpen, takk for søknaden!";
        }
    }
    ?>

    <form method="post">
        <input type="submit" name="søk" value="SØK PÅ STILLING">
    </form>

</body>
</html>
