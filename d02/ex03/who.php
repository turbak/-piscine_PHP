#!/usr/bin/php
<?php
$file = fopen("/var/run/utmpx", "r");
$read = [];
while ($line = fread($file, 628))
    $read[] = unpack("a256user/a4termid/a32tty/ipid/itype/I2time", $line);
date_default_timezone_set("Europe/Moscow");
$user = get_current_user();
$strings = null;
foreach ($read as $key)
{
    if (strstr($key["user"], $user)) {
        $login = $user;
        $tty =  $key["tty"];
        $date = date("M j H:i", $key['time1']);
        printf("%s %.7s %s\n", $login, $tty, $date);
    }
}
