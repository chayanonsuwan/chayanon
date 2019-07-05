<?php
$access_token = 'UHVfEcWiNbhq9r+HmWKjoihcCHj7DX/i8YoihTFMuRN3EdA8rxzGueMsu9y+d5pHHueHQfkO4pevBVVPmNKT8VDHlMW0tK4htcIhYL/72Pbo5Fy0/ZajSjFXn5JjoVNGYWfZKqGjtevxQ9XaX+a2LwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
