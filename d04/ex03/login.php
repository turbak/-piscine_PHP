<?php
include("auth.php");
session_start();
$login = $_GET["login"];
$passwd = $_GET["passwd"];
$_SESSION["loggued_on_user"] = auth($login, $passwd) ? $login : "";
if ($_SESSION["loggued_on_user"] != "")
	echo "OK\n";
else
	echo "ERROR\n";