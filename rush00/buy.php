<?php
session_start();
if ($_POST["itemid"]) {
	if ($_SESSION["loggued_on_user"] == "") {
		if (!$_SESSION["cart"][$_POST["itemid"]])
			$_SESSION["cart"][$_POST["itemid"]] = 1;
		else
			$_SESSION["cart"][$_POST["itemid"]] += 1;
		echo "Item added";
		var_dump($_SESSION);
	} else {
		if (!file_exists(("private/" . $_SESSION["loggued_on_user"]))) {
			file_put_contents(("private/" . $_SESSION["loggued_on_user"]), null);
		}
		$file = fopen("private/" . $_SESSION["loggued_on_user"], "r");
		$items = unserialize(file_get_contents("private/" . $_SESSION["loggued_on_user"], "w"));
		flock($file, LOCK_EX);
		if (!$items[$_POST["itemid"]])
			$items[$_POST["itemid"]] = 1;
		else
			$items[$_POST["itemid"]] += 1;
		file_put_contents("private/" . $_SESSION["loggued_on_user"], serialize($items));
		fclose($file);
		echo "Item added";
	}
}
?>