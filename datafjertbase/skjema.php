<form action="lagre_data.php" method="POST">
    Navn: <input type="text" name="navn"><br>
    E-post: <input type="text" name="epost"><br>
    <input type="submit" value="Lagre">
</form>


<?php
// Koble til databasen
$db = new mysqli('localhost', 'brukernavn', 'passord', 'databasenavn');

// Sjekk tilkoblingsfeil
if ($db->connect_error) {
    die("Feil ved tilkobling til databasen: " . $db->connect_error);
}

// Hent data fra skjemaet
$navn = $_POST['navn'];
$epost = $_POST['epost'];

// Lag en INSERT-spørring for å legge inn data i databasen
$sql = "INSERT INTO brukere (navn, epost) VALUES ('$navn', '$epost')";

// Utfør spørringen
if ($db->query($sql) === TRUE) {
    echo "Data ble lagret i databasen.";
} else {
    echo "Feil: " . $sql . "<br>" . $db->error;
}

// Lukk databasetilkoblingen
$db->close();
?>
