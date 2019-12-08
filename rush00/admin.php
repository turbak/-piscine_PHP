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
	$entry["img"] = $_POST["img"];
	$entry["id"] = $_POST["id"];
	$entry["q"] = $_POST["q"];
	$entry["price"] = $_POST["price"];
	$entry["cat"] = $_POST["cat"];
	$data[$_POST["id"]] = $entry;
	file_put_contents("private/database", serialize($data));
	echo "entry added";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Каталог</title>
	<link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/42_Logo.svg/1200px-42_Logo.svg.png" type="image/png">
	<link rel="stylesheet" href="cat.css">
</head>
<body>
<form action="admin.php" method="post">
	<p>Название продукта: <input type="text" name="name" /></p>
	<p>ID продукта: <input type="text" name="id" /></p>
	<p>Картинка: <input type="text" name="img" /></p>
	<p>Цена: <input type="text" name="price" /></p>
	<p>Количество: <input type="text" name="q" /></p>
    <p>Категория: <input type="text" name="cat" /></p>
	<p><input type="submit" name="submit" value="Отправить"/></p>
</form>
<form action="admin.php" method="post">
<table>
        <tr>
            <th>Name</th>
            <th>IMG</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
        </tr>
<?php
include("remove.php");
if(file_exists("private/database"))
{
	$data = unserialize(file_get_contents("private/database"));
	foreach ($data as &$one)
	{
		echo "<tr>";
		echo "<td>". $one["name"] ."</td>";
		echo "<td><img src=\"".$one["img"]."\"></td>";
		echo "<td>".$one["q"]."</td>";
		echo "<td>".$one["price"]."</td>";
		echo "<td>".$one["cat"]."</td>";
		echo "<td>". "<button name=\"remid\" value=" . $one["id"] . ">Удалить</button> <br/>" . "<td>";
		echo "</tr>";
	}
}
?>
</table>
    </form>
</body>
</html>