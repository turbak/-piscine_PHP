<?php
$data = [];
$file = fopen("list.csv", "r");
file("tmp.csv");
$tmp = fopen("tmp.csv", "w+");
while (($buf = fgetcsv($file, 0, ";")) != FALSE)
{
	if ($buf[0] != $_GET["id"]){
		$new["id"] = $buf[0];
		$new["msg"] = $buf[1];
		$data[] = $new;
	}
}
foreach ($data as $line)
{
	fputcsv($tmp, $line, ";");
}
rename("tmp.csv", "list.csv");
fclose($tmp);
fclose($file);