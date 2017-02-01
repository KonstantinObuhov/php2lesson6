<?php

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($className) {

    $filename = str_replace('\\', '/', $className) . '.php';
    $path = __DIR__ . '/' . $filename;

    if (file_exists($path)) {
        require $path;
    }

});