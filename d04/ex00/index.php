<?php
session_start();
if ($_GET["login"] && $_GET["passwd"] && $_GET["submit"] == "OK") {
	$_SESSION["login"] = $_GET["login"];
	$_SESSION["passwd"] = $_GET["passwd"];
}
?>
<html><body>
	<form name="index.php" method="get">
		<p>Username: <input type="text" name="login"></p>
		<p>Password: <input type="password" name="passwd"></p>
		<p><input type="submit" value="OK"></p>
	</form>
</body></html>
