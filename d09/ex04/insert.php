<?php
$list = [];
$file = fopen("list.csv", "rw+");
while (($data = fgetcsv($file, 0, ";")) !== FALSE) {
	$counter = $data[0];
}
$line["id"] = ++$counter;
$line["msg"] = $_GET["msg"];
fputcsv($file, $line, ";");
fclose($file);
?>