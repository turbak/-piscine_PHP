<?php
$data = [];
$file = fopen("list.csv", "r");
while (($buf = fgetcsv($file, 0, ";")) != FALSE)
		$data[$buf[0]] = $buf[1];
echo json_encode($data);
