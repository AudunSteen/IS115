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

// Definere variabler og gjøre dem tomme slik at de kan lagres
$usernameErr = $passwordErr = $phoneNumberErr = $emailErr = "";

// Sjekke om skjemaet har blitt sendt
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Du må skrive inn brukernavnet ditt";
    } else if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
        $passwordErr = "Du må skrive inn passordet ditt eller sørge for at det er minst 8 tegn langt";
    } else if (empty($_POST["phoneNumber"]) || strlen($_POST["phoneNumber"]) < 8) {
        $phoneNumberErr = "Du må skrive inn telefonnummeret ditt og sørge for at det er minst 8 sifre langt";
    } else if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Du må skrive inn din riktige e-postadresse";
    } else {
        // Legg til brukeren i databasen
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Lagre passordet sikkert
        $phoneNumber = $_POST["phoneNumber"];
        $email = $_POST["email"];
        
        $sql = "INSERT INTO Login (Brukernavn, Passord, Telefonnummer, Epost) VALUES ('$username', '$password', '$phoneNumber', '$email')";

        // Sjekk om spørringen ble utført riktig
        if ($conn->query($sql) === TRUE) {
            echo "Brukeren har blitt lagt til vellykket!";
        } else {
            echo "Feil ved legging av bruker: " . $conn->error;
        }
    }
}

// Lukk tilkoblingen
$conn->close();
?>

<!-- Opprette et skjema hvor brukeren kan fylle inn informasjonen sin og legger til feilmeldinger fra PHP-koden -->
<form method="post" action="">
    <label for="username">Brukernavn</label><br>
    <input type="text" id="username" name="username" required><br>
    <span class="error"> <?php echo $usernameErr ?></span><br>

    <label for="password">Passord</label><br>
    <input type="password" id="password" name="password" required><br>
    <span class="error"> <?php echo $passwordErr ?></span><br>

    <label for="phoneNumber">Telefonnummer</label><br>
    <input type="number" id="phoneNumber" name="phoneNumber" required><br>
    <span class="error"> <?php echo $phoneNumberErr ?></span><br>

    <label for="email">E-post</label><br>
    <input type="text" id="email" name="email" required><br>
    <span class="error"> <?php echo $emailErr ?></span><br>

    <input type="submit" name="submit" value="Send inn"><br>
</form>
