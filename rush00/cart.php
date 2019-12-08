<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Каталог</title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/42_Logo.svg/1200px-42_Logo.svg.png" type="image/png">
    <link rel="stylesheet" href="cat.css">
</head>
<body>
<h1>Каталог</h1>
<form method="post">
    <table>
        <tr>
            <th>Name</th>
            <th>IMG</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Category</th>
        </tr>
<?php
$base = unserialize(file_get_contents("private/database", "r"));
if (($_SESSION['loggued_on_user']) == "") {
	$count2 = 0;
    if ($_SESSION["cart"] != null) {
		foreach ($_SESSION["cart"] as $item => $count) {
            $one = $base[$item];
				echo "<tr>";
				echo "<td>". $one["name"] ."</td>";
				echo "<td><img src=\"".$one["img"]."\"></td>";
				echo "<td>".$count."</td>";
				echo "<td>".($one["price"] * $count)."</td>";
				echo "<td>".$one["cat"]."</td>";
				echo "</tr>";
			}
	}
}

else {
	$count2 = 0;
	if (file_exists("private/" . $_SESSION["loggued_on_user"])) {
		$items = unserialize(file_get_contents("private/" . $_SESSION["loggued_on_user"], "r"));
		if ($items)
		{
			foreach ($items as $item => $count) {
				$one = $base[$item];
				echo "<tr>";
				echo "<td>". $one["name"] ."</td>";
				echo "<td><img src=\"".$one["img"]."\"></td>";
				echo "<td>".$count."</td>";
				echo "<td>".($one["price"] * $count)."</td>";
				echo "<td>".$one["cat"]."</td>";
				echo "</tr>";
			}
		}
	}
}
?>
    </table>
        <button type="submit" name="clear" value="1">
			<?php
			if ($_POST["clear"] == "1")
			{
				if ($_SESSION["loggued_on_user"] == "")
					$_SESSION["cart"] = null;
				else
					file_put_contents("private/" . $_SESSION["loggued_on_user"], null);
			}
			?>
            Очистить корзину
        </button>
        <button type="submit" name="checkout" value="Рассчитать">
		    <?php
			    include("checkout.php");
		    ?>
            Рассчитать
        </button>
		<form action="index.php">
    		<input class="button1" type="submit" value="Вернуться на главную">
		</form>
</form>

</body>
</html>
