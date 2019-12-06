#!/usr/bin/php
<?php
if ($argc < 2)
    exit();
date_default_timezone_set('Europe/Paris');
$str = explode(" ", $argv[1]);
$weekdays = array(1 => "lundi", 2 => "mardi", 3 => "mercredi", 4 => "jeudi", 5 => "vandredi",
    6 => "samedi", 7 => "dimache");
$months = array(1 => "janvier", 2 => "fevrier", 3 => "mars", 4 => "avril", 5 => "mai", 6 => "juin", 7 => "julliet",
    8 => "aout", 9 => "septembre",
    10 => "octobre", 11 => "novembre", 12 => "decembre");
if (!(count($str) == 5 || preg_match("/^0[1-9]|[1-9]$|3[0-1]|[1-2][0-9]$/",
        $str[1]) || preg_match("/^2[0-9][0-9][0-9]|19[7-9][0-9]$/",
        $str[3]) || preg_match("/^[0-1][0-9]|2[0-3]:[0-5][0-9]:[0-5][0-9]$/",
        $str[4])))
{
    print "Wrong Format" . "\n";
        exit;
}
$day = array_search(lcfirst($str[0]), $weekdays);
$month = array_search(lcfirst($str[2]), $months);
if ($day === false || $month === false) {
    print "Wrong Format" . "\n";
    exit;
}
$mins = explode(":", $str[4]);
$time = mktime($mins[0], $mins[1], $mins[2], $month, $str[1], $str[3]);
if (date("N", $time) != $day)
    print "Wrong Format" . "\n";
else
    print $time;