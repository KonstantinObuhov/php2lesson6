<?php

require __DIR__ . '/../autoload.php';

$article2 = new \App\Models\Article();

$article2->title = 'test2 title2';
$article2->text = 'test2 text2';

$article2->insert();
