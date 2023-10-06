<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktskjema</title>
    <style>
        body {
            background-color: #f0f0f0;
            color: #333;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: red;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            background-color: #f8f8f8;
            color: #333;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kontaktskjema</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="navn">Navn:</label>
                <input type="text" id="navn" name="navn" required>
            </div>

            <div class="form-group">
                <label for="epost">E-postadresse:</label>
                <input type="email" id="epost" name="epost" required>
            </div>

            <div class="form-group">
                <label for="emne">Emne:</label>
                <input type="text" id="emne" name="emne" required>
            </div>

            <div class="form-group">
                <label for="melding">Melding:</label>
                <textarea id="melding" name="melding" rows="4" required></textarea>
            </div>

            <input type="submit" value="Send melding">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Hent data fra skjemaet
            $navn = $_POST['navn'];
            $epost = $_POST['epost'];
            $emne = $_POST['emne'];
            $melding = $_POST['melding'];

            // Vis meldingen på skjermen
            echo "<h2>Melding mottatt:</h2>";
            echo "<p><strong>Navn:</strong> $navn</p>";
            echo "<p><strong>E-postadresse:</strong> $epost</p>";
            echo "<p><strong>Emne:</strong> $emne</p>";
            echo "<p><strong>Melding:</strong> $melding</p>";
        }
        ?>
    </div>
</body>
</html>
