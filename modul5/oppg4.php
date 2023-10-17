<?php
// Funksjon for å kryptere en tekststreng
function krypterTekst($tekst, $nokkel) {
    $kryptertTekst = '';
    $tekstLengde = strlen($tekst);
    for ($i = 0; $i < $tekstLengde; $i++) {
        $kryptertTekst .= chr(ord($tekst[$i]) + $nokkel);
    }
    return $kryptertTekst;
}

// Funksjon for å dekryptere en tekststreng
function dekrypterTekst($kryptertTekst, $nokkel) {
    $dekryptertTekst = '';
    $tekstLengde = strlen($kryptertTekst);
    for ($i = 0; $i < $tekstLengde; $i++) {
        $dekryptertTekst .= chr(ord($kryptertTekst[$i]) - $nokkel);
    }
    return $dekryptertTekst;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["krypter"])) {
        $tekst = $_POST["tekst"];
        $nokkel = 3; // Du kan endre nøkkelen etter behov
        $kryptertTekst = krypterTekst($tekst, $nokkel);
        echo "Kryptert tekst: " . $kryptertTekst;
    } elseif (isset($_POST["dekrypter"])) {
        $kryptertTekst = $_POST["kryptert_tekst"];
        $nokkel = 3; // Samme nøkkel som brukt for kryptering
        $dekryptertTekst = dekrypterTekst($kryptertTekst, $nokkel);
        echo "Dekryptert tekst: " . $dekryptertTekst;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kryptering og Dekryptering</title>
</head>
<body>
    <h1>Kryptering og Dekryptering</h1>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="tekst">Tekst som skal krypteres:</label>
        <input type="text" name="tekst" required>
        <input type="submit" name="krypter" value="Krypter">
    </form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="kryptert_tekst">Kryptert tekst:</label>
        <input type="text" name="kryptert_tekst" required>
        <input type="submit" name="dekrypter" value="Dekrypter">
    </form>
</body>
</html>
