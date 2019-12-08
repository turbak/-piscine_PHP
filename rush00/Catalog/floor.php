<?php
include("../buy.php");
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
        }
    </style>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post">
    плитка 1
    <button name="itemid" value="1">Купить</button> <br/>
    плитка 2
    <button name="itemid" value="2">Купить</button> <br/>
    плитка 3
    <button name="itemid" value="3">Купить</button> <br/>
    плитка 4
    <button name="itemid" value="4">Купить</button> <br/>
</form>
<a href="../index.php">На главную</a>
</body>
</html>