<?php
session_start();
$data = file_get_contents("private/passwd");
$data = unserialize($data);
if ($data)
{
	foreach ($data as $key => $val) {
		if ($val["login"] == $_SESSION["loggued_on_user"]) {
			unset($data[$key]);
		}
	}
	file_put_contents("private/passwd", serialize($data));
}
$_SESSION["loggued_on_user"] = "";
header("Location: index.php");
echo "OK\n";