<?php
session_start();
include("buy.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Каталог</title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/42_Logo.svg/1200px-42_Logo.svg.png" type="image/png">
    <link rel="stylesheet" href="cat.css">
</head>
<body class="bodycat">
    <h1>Каталог</h1>
    <form action="index.php">
    	<input class="button1" type="submit" value="Вернуться на главную">
	</form>
    <form method="post">
    <table>
        <tr>
            <th>Name</th>
            <th>IMG</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
        </tr>
<?php
    include ("table.php")
?>
</table>
    </form>
</body>
</html>