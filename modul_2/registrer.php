
<?php
$_POST
$_GET
$_REQUEST

//skjema som lagrer informasjonen i enten array post eller get 
//bruker requiest for å hente informajson i  arrayen. 

?>
<html>
  <head>
    <title>Registrering av bruker</title>
  </head>
<body>
<pre> //enten bruke get eller post 
<form method="post" action=""> 

  Fornavn: <input type="text" name="fnavn" placeholder="Fornavn"><br>
  Etternavn: <input type="text" name="enavn" placeholder="Etternavn"><br>
  E-post: <input type="email" name="epost" placeholder="E-post"><br>
  Telefon: <input type="tel" name="tlf" placeholder="Mobilnummer"><br>
  Fødselsdato: <input type="date" name="fdato" value="2001-05-05"><br>
  <input type="submit" name="registrer" value="Registrér">
</form>
</pre>
</body>
</html>


