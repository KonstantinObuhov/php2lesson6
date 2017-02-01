<?php

require __DIR__ . '/autoload.php';

$logger = new App\Logger();
$logger->info("Info message",[1,2]);

echo __DIR__;