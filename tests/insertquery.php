<?php

require __DIR__ . '/../autoload.php';
//require dirname(dirname(__FILE__)).'/autoload.php';

$db = new App\Db();
var_dump($db->execute('INSERT INTO authors(firstname,lastname) VALUES (:firstname,:lastname)', [':firstname' => 'testfn', ':lastname' => 'testln']));