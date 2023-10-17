<!DOCTYPE html>
<html>
<head>
    <title>Temperaturkonverterer</title>
</head>
<body>
    <h1>Temperaturkonverterer</h1>
    
    <?php
    $resultat = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperatur = $_POST["temperatur"];
        $skala = $_POST["skala"];
        
        if ($skala == "celsiusToFahrenheit") {
            $resultat = ($temperatur * 9/5) + 32;
        } elseif ($skala == "fahrenheitToCelsius") {
            $resultat = ($temperatur - 32) * 5/9;
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="temperatur">Temperatur:</label>
        <input type="number" name="temperatur" step="0.01" required>

        <label for="skala">Konverter til:</label>
        <select name="skala">
            <option value="celsiusToFahrenheit">Celsius til Fahrenheit</option>
            <option value="fahrenheitToCelsius">Fahrenheit til Celsius</option>
        </select>

        <input type="submit" value="Konverter">
    </form>

    <?php
    if ($resultat != '') {
        echo "<p>Resultat: $resultat</p>";
    }
    ?>

</body>
</html>
