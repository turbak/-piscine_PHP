#!/usr/bin/php
<?php
if ($argc < 2 || !file_exists($argv[1]))
    exit();
$file = fopen($argv[1], 'r');
while ($file && !feof($file)) {
    $page .= fgets($file);
}
$page = preg_replace_callback(
    "/(<a )(.*?)(>)(.*)(<\/a>)/si",
    function ($matches){
        $matches[0] = preg_replace_callback(
            "/(title=\")(.*?)(\")/mi",
            function ($matches) {
                var_dump($matches);
                return $matches[1] . strtoupper($matches[2]) . $matches[3];
            },
            $matches[0]);

        $matches[0] = preg_replace_callback(
            "/(>)(.*?)(<)/",
            function ($matches) {
                return $matches[1] . strtoupper($matches[2]) . $matches[3];
            },
            $matches[0]);
        return ($matches[0]);
    }, $page);
print $page;