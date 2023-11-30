<?php
$server = "localhost";
$brukernavn = "root";
$passord = "";
$database = "modul7";

// Opprett tilkobling
$conn = new mysqli($server, $brukernavn, $passord, $database);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

// Opprett tabell for jobbannonser
$sql_create_table = "CREATE TABLE IF NOT EXISTS jobbannonser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tittel VARCHAR(255) NOT NULL,
    beskrivelse TEXT,
    publiseringsdato DATE,
    interesse VARCHAR(255) NOT NULL
)";
$conn->query($sql_create_table);

// Hent data fra jobbannonser
if (isset($_GET['interesse'])) {
    // Filtrer jobbannonser basert på interesse hvis en interesse er valgt
    $interesse_filter = $_GET['interesse'];
    $sql_select_annonser = "SELECT * FROM jobbannonser WHERE interesse = '$interesse_filter'";
} else {
    // Hvis ingen interesse er valgt, hent alle jobbannonser
    $sql_select_annonser = "SELECT * FROM jobbannonser";
}

$result = $conn->query($sql_select_annonser);

//inner joints for to nye tabeller 
// en for prefereanser og en for brukerpreferanser 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobbannonser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Jobbannonser</h1>
    
    <form method="GET">
        <label for="interesse">Velg interesse:</label>
        <select name="interesse">
            <option value="">Alle</option>
            <option value="IT">IT</option>
            <option value="Administrasjon">Administrasjon</option>
            <option value="Økonomi">Økonomi</option>
        </select>
        <input type="submit" value="Filtrer">
    </form>

    <table>
        <tr>
            <th>Tittel</th>
            <th>Beskrivelse</th>
            <th>Publiseringsdato</th>
            <th>Interesse</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["tittel"] . "</td>";
                echo "<td>" . $row["beskrivelse"] . "</td>";
                echo "<td>" . $row["publiseringsdato"] . "</td>";
                echo "<td>" . $row["interesse"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Ingen jobbannonser tilgjengelig.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

