<?php
session_start();
if ($_SESSION['loggued_on_user'] == "" && $_POST["submit"] == "Рассчитать")
	echo "Вы должны зарегестрироваться для совершения покупки";
else if ($_POST["checkout"] == "Рассчитать")
{
	if (!file_exists("private"))
		mkdir("private");
	if (!file_exists("private/checkout"))
		file_put_contents("private/checkout", null);
	$data = unserialize(file_get_contents("private/checkout"));
	$user = unserialize(file_get_contents("private/" . $_SESSION["loggued_on_user"]));
	var_dump($user);
	foreach ($user as $item => $value)
		$entry = $item;
	$data[] = $entry;
	file_put_contents("private/checkout", serialize($data));
}
?>