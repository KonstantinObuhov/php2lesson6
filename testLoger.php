<?php

require __DIR__ . '/autoload.php';

$logger = new App\Logger();
$logger->info("Info message");

echo __DIR__;