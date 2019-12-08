<?php
session_start();
if (!$_SESSION["admin"])
    header("Location: index.php");
if ($_POST["submit"] == "Отправить" && $_POST["name"] && $_POST["id"] && $_POST["img"] && $_POST["price"])
{
	if (!file_exists("private"))
		mkdir("private");
	if (!file_exists("private/database"))
		file_put_contents("private/database", null);
	$data = unserialize(file_get_contents("private/database"));
	$entry["name"] = $_POST["name"];
	$entry["id"] = $_POST["id"];
	$entry["img"] = $_POST["img"];
	$entry["price"] = $_POST["price"];
	$entry["cat"] = $_POST["cat"];
	$data[] = $entry;
	file_put_contents("private/database", serialize($data));
	echo "entry added";
}
?>
<form action="admin.php" method="post">
	<p>Название продукта: <input type="text" name="name" /></p>
	<p>ID продукта: <input type="text" name="id" /></p>
	<p>Картинка: <input type="text" name="img" /></p>
	<p>Цена: <input type="text" name="price" /></p>
	<p>Количество: <input type="text" name="price" /></p>
    <p>Категория: <input type="text" name="cat" /></p>
	<p><input type="submit" name="submit" value="Отправить"/></p>
</form>