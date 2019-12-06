<?php
$uname = $_SERVER["PHP_AUTH_USER"];
$psswd = $_SERVER["PHP_AUTH_PW"];
if ($uname == "zaz" && $psswd == "Ilovemylittleponey") {
    echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," .
        base64_encode(file_get_contents("../img/42.png")) . "'>\n</body></html>\n";
    return;
 }
else
{
    header("HTTP/1.0 401 Unauthorized");
    header("WWW-Authenticate: Basic realm=\"Member area\"");
    header("Content-Type: text/html");
}
?>
<html><body>That area is accessible for members only</body></html>
