<?php
    session_start();
    date_default_timezone_set("Europe/Moscow");
    if ($_SESSION["loggued_on_user"])
    {
        if (!file_exists("private"))
            mkdir("private");
        if (file_exists("private/chat"))
            $messages = unserialize(file_get_contents("../private/chat"));
        else
        {
            $messages = array();
            file_put_contents("../private/chat", serialize([]));
        }
        $check = fopen("private/chat", "r+");
        if (flock($check, LOCK_EX) && $_POST["send"] === "send")
        {
            $messages[] = array("login" => $_SESSION["loggued_on_user"], "time" => date("Y-m-d H:i",time()), "msg" => $_POST["msg"]);
            file_put_contents("private/chat", serialize($messages));
            fclose($check);
        }
    }
    else
    {
        echo "Chat not available\n";
        exit(0);
    }
?>
<head>
    <style>
        .chat {
            background-color: white;
            width: 90%;
        }
        .but {
            background-color: green;
            width: 9%;
            font-size: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <script language="javascript">
        top.frames['chat'].location = 'chat.php';
    </script>
    <form action="speak.php" method="POST">
        <input class="chat" name="msg" type="text" />
        <input class="but" name="send" type="submit"  value="send"/>
    </form>
</body>