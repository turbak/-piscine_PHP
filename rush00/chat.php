<?php
    session_start();
    date_default_timezone_set("Europe/Moscow");
    if ($_SESSION["loggued_on_user"])
    {
        if (!file_exists("../private"))
            mkdir("../private");
        if (file_exists("../private/chat"))
            $messages = unserialize(file_get_contents("../private/chat"));
        else
        {
            $messages = array();
            file_put_contents("../private/chat", serialize([]));
        }
        $check = fopen("../private/chat", "r+");
        if (flock($check, LOCK_SH))
        {
            $messages = unserialize(file_get_contents("../private/chat"));
            flock($check, LOCK_UN);
            fclose($check);
        }
        foreach($messages as &$one)
        {
            echo "[".$one["time"]."]<b>".$one["login"]."</b>: ".$one["msg"]."<br>";
        }
    }
?>