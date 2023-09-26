<!DOCTYPE html>
<html>
<head>
    <title>Modul 1</title>
</head>
<body>
<section>
    <?php
    // variabler
    $navn = "Audun Steen";
    $alder = 23;
    $yrke = "tulling";
    ?>

    <h2>Variabler i en tabell:</h2>
    <table border='17'>
        <tr><th>Navn</th><th>Alder</th><th>Yrke</th></tr>
        <tr><td><?= $navn ?></td><td><?= $alder ?></td><td><?= $yrke ?></td></tr>
    </table>

    <h2>Variabler i en nummerert liste:</h2>
    <ol>
        <li>Navn: <?= $navn ?></li>
        <li>Alder: <?= $alder ?></li>
        <li>Yrke: <?= $yrke ?></li>
    </ol>

    <h2>Variabler i en punktmerket liste:</h2>
    <ul>
        <li>Navn: <?= $navn ?></li>
        <li>Alder: <?= $alder ?></li>
        <li>Yrke: <?= $yrke ?></li>
    </ul>

    <h2>Variabler i en paragraf:</h2>
    <p>
        Navn: <?= $navn ?><br>
        Alder: <?= $alder ?><br>
        Yrke: <?= $yrke ?><br>
    </p>
</section>
</body>
</html>
