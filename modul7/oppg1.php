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

// Legg til en jobbannonse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tittel = $_POST['tittel'];
    $beskrivelse = $_POST['beskrivelse'];
    $publiseringsdato = date('Y-m-d');
    $interesse = $_POST['interesse'];

    $sql_insert_annonse = "INSERT INTO jobbannonser (tittel, beskrivelse, publiseringsdato, interesse) VALUES ('$tittel', '$beskrivelse', '$publiseringsdato', '$interesse')";
    $conn->query($sql_insert_annonse);
}

// Hent data fra jobbannonser
$sql_select_annonser = "SELECT * FROM jobbannonser";
$result = $conn->query($sql_select_annonser);

// Vis data i en HTML-tabell
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobbannonser og Søknader</title>
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

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
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

    <h2>Legg til en jobbannonse</h2>
    <form method="POST">
        <label for="tittel">Tittel:</label>
        <input type="text" name="tittel" required>
        <br>
        <label for="beskrivelse">Beskrivelse:</label>
        <textarea name="beskrivelse" required></textarea>
        <br>
        <label for="interesse">Interesse:</label>
        <select name="interesse">
            <option value="IT">IT</option>
            <option value="Administrasjon">Administrasjon</option>
            <option value="Økonomi">Økonomi</option>
        </select>
        <br>
        <input type="submit" value="Legg til jobbannonse">
    </form>
</body>
</html>
