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
else {
	if (!file_exists(("private/" . $_SESSION["loggued_on_user"]))) {
		file_put_contents(("private/" . $_SESSION["loggued_on_user"]), null);
	}
	$file = fopen("private/" . $_SESSION["loggued_on_user"], "r");
	flock($file, LOCK_EX);
	$items = unserialize(file_get_contents("private/" . $_SESSION["loggued_on_user"], "w"));
	if ($_SESSION["cart"]) {
		foreach ($_SESSION["cart"] as $item => $count) {
			if (!$items[$item])
				$items[$item] = $count;
			else
				$items[$item] += $count;
		}
	}
	file_put_contents("private/" . $_SESSION["loggued_on_user"], serialize($items));
	$_SESSION["cart"] = null;
	header("Location: index.php");
}
?>
