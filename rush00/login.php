<?php
include("auth.php");
session_start();
$login = $_POST["login"];
$passwd = $_POST["passwd"];
$_SESSION["loggued_on_user"] = auth($login, $passwd) ? $login : "";
if ($_SESSION["loggued_on_user"] == "") {
	header("Location: login.html");
	echo "ERROR\n";
}
else
	header("Location: index.php");
?>
