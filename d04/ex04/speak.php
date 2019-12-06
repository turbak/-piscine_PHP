<?php
session_start();
if (!($_SESSION['loggued_on_user'])) {
	echo "ERROR\n";
	header('Location: index.html');
}
if (!file_exists("../private/chat")) {
	file_put_contents("../private/chat", null);
}
else if ($_POST["msg"] != "") {
	$file = fopen("../private/chat", "r");
	$chat = unserialize(file_get_contents("../private/chat", "w"));
	flock($file, LOCK_EX);
	$message["msg"] = $_POST["msg"];
	$message["time"] = time();
	$message["login"] = $_SESSION['loggued_on_user'];
	$chat[] = $message;
	file_put_contents("../private/chat", serialize($chat));
	fclose($file);
}
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form action="speak.php" method="post">
	<input type="text" value="" name="msg" width="100%" height="50px"/>
	<input type="submit" value="submit"/>
</form>
</body>
</html>
