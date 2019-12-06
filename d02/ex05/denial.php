#!/usr/bin/php
<?php
if ($argc != 3)
    exit;
if (file_exists($argv[1]))
    $file = fopen($argv[1],"r");
else
    exit;
$flag = true;
if ($argv[2] === 'name')
	$id = 1;
else if ($argv[2] === 'surname')
	$id = 0;
else if ($argv[2] === 'mail')
	$id = 2;
else if ($argv[2] === 'login')
	$id = 4;
else if ($argv[2] === 'IP')
	$id = 3;
else
	exit;
$table = [];
while (($data = fgetcsv($file,  932, ";")) !== FALSE) {
    if ($flag == true) {
		$flag = false;
	}
    else if (count($data) == 5 && !key_exists($data[$id], $table))
	{
		$table[$data[$id]] = null;
		$table[$data[$id]]['name'] = $data[0];
		$table[$data[$id]]['last_name'] = $data[1];
		$table[$data[$id]]['mail'] = $data[2];
		$table[$data[$id]]['IP'] = $data[3];
		$table[$data[$id]]['login'] = $data[4];
	}
}
if ($id == 0)
{
	foreach ($table as $key => $val)
	{
		$surname[$key] = $val['last_name'];
		$last_name[$key] = $val['name'];
		$mail[$key] = $val['mail'];
		$IP[$key] = $val['IP'];
		$login[$key] = $val['login'];
	}
}
else
{
	foreach ($table as $key => $val)
	{
		$name[$key] = $val['name'];
		$last_name[$key] = $val['last_name'];
		$mail[$key] = $val['mail'];
		$IP[$key] = $val['IP'];
		$login[$key] = $val['login'];
	}
}

$stdin = fopen("php://stdin","r");
while (true)
{
	print "Enter your command: ";
	$com = fgets($stdin);
    if (!($stdin && !feof($stdin))) {
        print "\n";
        break;
    }
    if ($com)
    	try {
			eval ($com);
		}
    	catch (Error $e){
			echo $e->getMessage() . "\n";
		}
    else
    	break;
}
