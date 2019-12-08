<?php
if ($_SESSION["loggued_on_user"] == "") {
	echo "<a href=\"login.html\"><button>Регистрация/Вход</button></a>";
	return;
}
else {
	echo "<p>" . $_SESSION["loggued_on_user"] . "</p>";
}
?>
<form>
    <button type="submit" name="Delete" formaction="delete.php">Delete</button>
	<button type="submit" name="Logout" formaction="logout.php">Logout</button><br />
</form>
