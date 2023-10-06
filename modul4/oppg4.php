<?php
// Multidimensjonal matrise med informasjon om jobbannonser eller veiledningsbookinger
$annonser_eller_veiledninger = [
    [
        "Jobbannonse" => "Systemutvikler",
        "beskrivelse" => "Backend utvikler for Edge",
        "Søknadsfrist" => "2023-10-15",
        "lokasjon" => "Oslo"
    ],
    [
        "Jobbannonse" => "UX designer",
        "beskrivelse" => "Designe ny applikasjon for norkart",
        "Søknadsfrist" => "2023-10-20",
        "lokasjon" => "Dublin"
    ],
    [
        "Jobbannonse" => "Hovland Sin caddie",
        "beskrivelse" => "Verdensmester Victor Hovland trenger ny assistent på golfbanen",
        "Søknadsfrist" => "2023-10-25",
        "lokasjon" => "Ved siden av Hovland"
    ]
];

// Start HTML-tabellen
echo "<table border='1'>";
echo "<tr><th>Jobbannonse</th><th>Beskrivelse</th><th>Søknadsfrist</th><th>Lokasjon</th></tr>";

// Gå gjennom matrisen og vis informasjonen i tabellen
foreach ($annonser_eller_veiledninger as $annonse_eller_veiledning) {
    echo "<tr>";
    echo "<td>" . $annonse_eller_veiledning["Jobbannonse"] . "</td>";
    echo "<td>" . $annonse_eller_veiledning["beskrivelse"] . "</td>";
    echo "<td>" . $annonse_eller_veiledning["Søknadsfrist"] . "</td>";
    echo "<td>" . $annonse_eller_veiledning["lokasjon"] . "</td>";
    echo "</tr>";
}

// Avslutt HTML-tabellen
echo "</table>";
?>
