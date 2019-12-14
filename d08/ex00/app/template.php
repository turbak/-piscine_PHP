<?php


function add_template($title, $main) {

    $head = <<<HEAD
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles.css">
	<link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<title>$title</title>
</head>
HEAD;

	$mymain = <<<MAIN
<main>
$main
</main>
MAIN;

    $body = <<<BODY
<body>
$mymain
</body>
BODY;

    return <<< TEMLPATE
<!DOCTYPE html>
<html lang="en">
$head
$body
</html>
TEMLPATE;

}