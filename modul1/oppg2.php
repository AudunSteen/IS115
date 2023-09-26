<?php

/* `phpinfo()` er viktig for diagnostisering og optimalisering av PHP-konfigurasjonen på en webserver. Det gir detaljert informasjon om serverinnstillinger og PHP-moduler.
Ved bruk av phpinfo() er det mulig å se hvordan PHP er konfiguert i localhost. Funksjonen kaller fram en rekke tabeller som forklarer syntaxen til PHP og ulike funksjoner. 
Noe som er nyttig for utviklere som skal programmere PHP. 

display_errors: Da jeg kjørte phpinfo(), viste innstillingen for display_errors at den var satt til "On". Dette betyr at feilmeldinger blir vist direkte på nettsiden hvis det oppstår feil i PHP-skriptene.

document_root: phpinfo() viste at document_root-innstillingen anga banen til rotkatalogen som her tilsier hvor apache miljøet og xampp er installert på PC´en. 
Det er viktig å vite om det er installert riktig. */

phpinfo();

?>

