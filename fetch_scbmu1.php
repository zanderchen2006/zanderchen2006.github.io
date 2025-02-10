<?php
$username = "webcam";
$password = "Website1234";
$url = "http://za2uzxe0cu6f1qn7.myfritz.net:8221/cgi-bin/snapshot.cgi";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
curl_setopt($ch, CURLOPT_HEADER, false);

$image = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_status == 200) {
    header("Content-Type: image/jpeg");
    echo $image;
} else {
    header("Content-Type: text/plain");
    echo "Fehler beim Laden des Kamera-Bildes.";
}
?>