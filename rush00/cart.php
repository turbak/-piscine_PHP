<?php
session_start();
if (($_SESSION['loggued_on_user']) == "") {
	$count2 = 0;
    if ($_SESSION["cart"] != null) {
		foreach ($_SESSION["cart"] as $item => $count) {
			if ($item == 1)
				echo "Первой плитки " . $count . "<br />";
			else if ($item == 2)
				echo "Второй плитки " . $count . "<br />";
			else if ($item == 3)
				echo "Третьей плитки " . $count . "<br />";
			else if ($item == 4)
				echo "Четвертой плитки " . $count . "<br />";
			else if ($item == 5)
				echo "Пятой плитки " . $count . "<br />";
			else if ($item == 6)
				echo "Шестой плитки " . $count . "<br />";
			else if ($item == 7)
				echo "Седьмой плитки " . $count . "<br />";
			else if ($item == 8)
				echo "Восьмой плитки " . $count . "<br />";
			else if ($item == 9)
				echo "Девятой плитки " . $count . "<br />";
			$count2 += $count;
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
				if ($item == 1)
					echo "Первой плитки " . $count . "<br />";
				else if ($item == 2)
					echo "Второй плитки " . $count . "<br />";
				else if ($item == 3)
					echo "Третьей плитки " . $count . "<br />";
				else if ($item == 4)
					echo "Четвертой плитки " . $count . "<br />";
				else if ($item == 5)
					echo "Пятой плитки " . $count . "<br />";
				else if ($item == 6)
					echo "Шестой плитки " . $count . "<br />";
				else if ($item == 7)
					echo "Седьмой плитки " . $count . "<br />";
				else if ($item == 8)
					echo "Восьмой плитки " . $count . "<br />";
				else if ($item == 9)
					echo "Девятой плитки " . $count . "<br />";
				$count2 += $count;
			}
		}
	}
}
echo "Всего " . $count2 . " вещей в корзине<br/>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="index.php">На главную</a>
<form method="post">
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
	<button type="submit" name="checkout" value="2">
		<?php
		if ($count != 0 && ($_POST["checkoutr"] == "2")) {
			include("checkout.php");
		}
		?>
		Checkout
	</button>
</form>
</body>
</html>