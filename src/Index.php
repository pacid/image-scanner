<?php

namespace TestExam;

require __DIR__ . '/../vendor/autoload.php';

if (!isset($argv) || empty($argv[1]) || filter_var($argv[1], FILTER_VALIDATE_URL) === false) {
    echo("$argv[1] is not a valid URL");
    exit;
}

$imageScanner = new ImageScanner();
var_dump(json_encode($imageScanner->fetch($argv[1])));
