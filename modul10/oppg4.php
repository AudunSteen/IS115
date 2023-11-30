<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV Form</title>
</head>
<body>
    <h2>Last opp CSV-fil for å legge til nye brukere</h2>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <label for="csvFile">Velg CSV-fil:</label>
        <br><input type="file" name="csvFile" accept=".csv" required>
        <br>
        <input type="submit" value="Last opp">
        <br><a href="../modul10/index.php">Tilbake til startside</a>
    </form>
</body>
</html>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$brukernavn = "root";
$passord = "";
$database = "modul10";

// Opprett tilkobling
$conn = new mysqli($server, $brukernavn, $passord, $database);

// Sjekk tilkoblingen
if ($conn->connect_error) {
    die("Tilkobling mislyktes: " . $conn->connect_error);
}

// Hashe passord som kommer inn
function HashPass($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to insert user into the database
function insertUser($conn, $password, $name) {
    $hashedPassword = HashPass($password);
    $stmt = $conn->prepare("INSERT INTO user (password, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $hashedPassword, $name);

    if ($stmt->execute()) {
        echo "Bruker satt inn i DB: $name<br>";
    } else {
        echo "En feil skjedde: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Handle file upload
if (isset($_FILES["csvFile"])) {
    $file = $_FILES["csvFile"];

    // Sjekke om filen er CSV
    $fileType = pathinfo($file["name"], PATHINFO_EXTENSION);
    if (strtolower($fileType) == "csv") {
        // Lagre filen midlertidlig
        $tempFilePath = $file["tmp_name"];

        // Lese fra filen
        $file = fopen($tempFilePath, "r");

        if ($file) {
            // Må skippe headeren dersom den eksisterer
            fgetcsv($file);

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $password = $data[0];
                $name = $data[1];

                insertUser($conn, $password, $name);
            }

            fclose($file);
            echo "Data lagret!.<br>";
        } else {
            echo "Klarte ikke å åpne filen<br>";
        }
    } else {
        echo "Last opp riktig CSV-fil.<br>";
    }
}

// Lukk databaseforbindelsen
$conn->close();
?>
