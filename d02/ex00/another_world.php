#!/usr/bin/php
<?php
if ($argc < 2)
    exit();
print trim(preg_replace("/[ \t]+/", " ", $argv[1])) . "\n";