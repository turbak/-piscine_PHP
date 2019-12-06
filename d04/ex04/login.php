<?php
include("auth.php");
session_start();
$login = $_POST["login"];
$passwd = $_POST["passwd"];
$_SESSION["loggued_on_user"] = auth($login, $passwd) ? $login : "";
if ($_SESSION["loggued_on_user"] == "") {
	header("Location: index.html");
	echo "ERROR\n";
}
?>
<html>
	<body>
    <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
    <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
