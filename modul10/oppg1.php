

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktskjema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .form-container {
            width: 80%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 15px auto 0;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .success, .error {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            background-color: #d7fdd8;
        }

        .error {
            color: red;
            background-color: #ffd7d7;
        }
    </style>
</head>

<body>
    <h2>Kontaktskjema</h2>

    <body>

    <?php
    // Bruk Composer-autoloader for å laste inn PHPMailer
    require 'vendor/autoload.php';

    // Legg til mottakerens e-postadresse
    $til = "audunste1@gmail.com";

    // Lager variabler for skjemaet og setter de til å være tomme
    $navn = $epost = $emne = $melding = $senderEpost = "";
    $feilmeldinger = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hent data fra skjemaet
        $navn = $_POST['navn'];
        $epost = $_POST['epost'];
        $emne = $_POST['emne'];
        $melding = $_POST['melding'];
        $senderEpost = $_POST['senderEpost']; // Added sender email field

        // Sjekk om e-postadressen er gyldig
        if (filter_var($epost, FILTER_VALIDATE_EMAIL) && filter_var($senderEpost, FILTER_VALIDATE_EMAIL)) {
            // Opprett en ny PHPMailer-instans
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            // Sett SMTP-serveren og porten
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Erstatt med riktig SMTP-serveradresse
            $mail->Port = 587;      // Erstatt med riktig SMTP-portnummer

            // Legg til andre nødvendige innstillinger
            $mail->SMTPAuth = true;
            $mail->Username = 'donaudsteen@outlook.com'; // Erstatt med din Outlook.com e-postadresse
            $mail->Password = 'Bayernmunchen'; // Erstatt med ditt Outlook.com passord

            // Legg til andre nødvendige innstillinger
            $mail->setFrom($senderEpost, $navn); // Use sender email for "From" field
            $mail->addAddress($til);
            $mail->Subject = $emne;
            $mail->Body = $melding;

            // Send e-post
            if ($mail->send()) {
                echo '<p class="success">Meldingen din er sendt!</p>';
                $navn = $epost = $emne = $melding = $senderEpost = ""; // Reset form fields after successful submission
            } else {
                echo '<p class="error">E-posten kunne ikke sendes. Feil: ' . $mail->ErrorInfo . '</p>';
            }
        } else {
            echo '<p class="error">Feil: Ugyldig e-postadresse.</p>';
        }
    }
    ?>

    <div class="form-container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="navn">Navn:</label>
            <input type="text" id="navn" name="navn" value="<?php echo $navn; ?>" required>

            <label for="epost">E-postadresse:</label>
            <input type="email" id="epost" name="epost" value="<?php echo $epost; ?>" required>

            <label for="senderEpost">Avsender E-postadresse:</label>
            <input type="text" id="senderEpost" name="senderEpost" value="<?php echo $senderEpost; ?>" required>

            <label for="emne">Emne:</label>
            <input type="text" id="emne" name="emne" value="<?php echo $emne; ?>" required>

            <label for="melding">Melding:</label>
            <textarea id="melding" name="melding" rows="4" cols="50" required><?php echo $melding; ?></textarea>

            <input type="submit" name="submit" value="Send melding">
        </form>
    </div>

</body>

</html>
