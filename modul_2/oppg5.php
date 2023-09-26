
<?php


// if statement som sjekker om det er noe innhold i registrering

if(isset($_REQUEST["register"]))
{
    echo $_REQUEST["fnavn"] . "<br>"; 
    echo $_REQUEST["enavn"] . "<br>"; 
    echo $_REQUEST["epost"] . "<br>"; 
    echo $_REQUEST["tlf"] . "<br>"; 

}

//skjema som lagrer informasjonen i enten array post eller get 
//bruker requiest for å hente informajson i  arrayen. 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Ordbok</title>
</head>
<body>
  <h1>Norsk-Engelsk Ordbok</h1>
  <form id="ordbokForm">
    Norsk ord: <input type="text" id="norskOrd" placeholder="Skriv inn et norsk ord">
    <input type="button" value="Oversett" onclick="oversett()">
  </form>
  <p>Engelsk oversettelse: <span id="engelskOversettelse"></span></p>

  <script>
    // Ordbok med norske-til-engelske oversettelser (eksempeldata)
    var ordbok = {
      "hund": "dog",
      "katt": "cat",
      "bil": "car",
      "liten fitte": "tore andre harr",
      // Legg til flere ord og oversettelser etter behov
    };

    function oversett() {
      var norskOrd = document.getElementById("norskOrd").value.toLowerCase();
      var engelskOversettelse = ordbok[norskOrd];
      var oversettelseSpan = document.getElementById("engelskOversettelse");

      if (engelskOversettelse) {
        oversettelseSpan.textContent = engelskOversettelse;
      } else {
        oversettelseSpan.textContent = "Fant ingen oversettelse for dette ordet.";
      }
    }
  </script>
</body>
</html>


