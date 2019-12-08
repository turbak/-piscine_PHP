<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Магазин тру-кодеров</title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/42_Logo.svg/1200px-42_Logo.svg.png" type="image/png">
    <link href="index.css" rel="stylesheet">
</head>
<body>
<div class="grid-container1">
    <div>
        <img class="color5" src="https://media.rabota.ru/processor/logo/original/2018/06/21/pjaterochka.png">
    </div>
    <div class="colorh">
        <a href="cart.php">
			<a href="cart.php"><img class="basket" src="https://cdn0.iconfinder.com/data/icons/shopping-and-commerce-outline/512/Shopping_and_Commerce_-_Outline_26-512.png" title="Basket">
		</a>
		<?php
            include("display.php");
        ?>
	</div>

<div class="grid-container2">
    <div class="color">
        <a href="menu.php">
            <img class="home" src="https://media.istockphoto.com/illustrations/home-icon-red-round-button-illustration-id946516300?k=6&m=946516300&s=170667a&w=0&h=fFq7IV94t5Qfvbkgcytg_dIah5ZueVgM7PIGaVVyWSM=" title="Home">
        </a>
    </div>
    <div class="color">
        <a href="basket.php">
            <img class="category" src="http://stavr-tools.ru/upload/medialibrary/e8a/katalog.jpg" title="Category">
        </a>
    </div>
    <div class="color">
        <a href="contacts.php">
            <img class="contacts" src="https://i.pinimg.com/originals/93/4b/79/934b793dd7859f07c3862a38db94d368.png" title="Contacts">
        </a>
    </div>
</div>
<div class="grid-container3">
    <iframe class="chati" name="chat" src="chat.php"></iframe>
    <iframe class="texti" name="speak" src="speak.php"></iframe>
</div>
</body>
</html>