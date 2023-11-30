<?php

//filterer ut fra når jobbanonsen går ut 


// Koble til databasen (endre tilpasset dine databaseopplysninger)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modul7";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

// Finn dagens dato
$dagens_dato = date("Y-m-d");

// SQL-spørring for å hente kun pågående jobbannonser sortert etter startdato
$sql_pagaende_annonser = "SELECT * FROM jobbannonser WHERE publiseringsdato <= '$dagens_dato' ORDER BY publiseringsdato";

// Hent kun pågående jobbannonser og sortert etter dato
$result_pagaende_annonser = $conn->query($sql_pagaende_annonser);

echo "<h1>Oversikt over pågående jobbannonser (sortert etter publiseringsdato)</h1>";

// Vis tabell med kun pågående jobbannonser
echo "<table border='1'>";
echo "<tr><th>Tittel</th><th>Beskrivelse</th><th>Publiseringsdato</th></tr>";

while ($row = $result_pagaende_annonser->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["tittel"] . "</td>";
    echo "<td>" . $row["beskrivelse"] . "</td>";
    echo "<td>" . $row["publiseringsdato"] . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>
