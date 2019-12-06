<?php
session_start();
date_default_timezone_set("Europe/Moscow");
if (!($_SESSION['loggued_on_user'])) {
	header("Location: index.html");
	echo "ERROR\n";
}
else {
	if (file_exists("../private/chat")) {
		$chat = unserialize(file_get_contents("../private/chat"));
		if ($chat) {
			foreach ($chat as $key => $val) {
				echo "[" . date("G:i", $val["time"]) . "] <b>" . $val["login"] . "</b>: " . $val["msg"] . "<br />";
			}
		}
	}
}
?>
