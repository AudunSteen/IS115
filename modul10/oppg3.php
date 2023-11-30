<?php

$apiKey = '38c4b668689542659ffea4c0170412cd';

$url = 'https://maps.geoapify.com/v1/staticmap?' .
    'style=osm-carto&' .
    'width=600&' .
    'height=400&' .
    'center=lonlat:9.673405,59.125146&' .
    'zoom=11.709&' .
    'marker=lonlat:9.552653482604057,59.19106926830486;color:%23ff0000;size:medium&' .
    'apiKey=' . $apiKey;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Map Page</title>
</head>
<body>

<?php
echo 'Velkommen til Porsgrunn<br>';

echo 'Den koseligste byen som finnes!<br>';
echo '<img src="' . $url . '" width="600px">';

?>

</body>
</html>
