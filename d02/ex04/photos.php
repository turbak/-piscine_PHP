#!/usr/bin/php
<?php
if ($argc < 2)
    exit;
$res = curl_init();
curl_setopt($res, CURLOPT_URL, $argv[1]);
curl_setopt($res, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($res);
$dir = explode("www", $argv[1]);
$path = "www" . $dir[1];
$imgurls = [];
if (!is_dir($path))
    mkdir($path);
preg_match_all('/<img(.*?)src="(.*?)"/', $data, $imgurls);
foreach ($imgurls[2] as $img)
{
    $url = curl_init();
    curl_setopt($url, CURLOPT_URL, $img);
    curl_setopt($url, CURLOPT_RETURNTRANSFER, 1);
    $image = curl_exec($url);
    $name = explode('/', $img);
    file_put_contents("./" . $path . "/" . $name[count($name) - 1], $image);
}
