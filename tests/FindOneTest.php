<?php

require __DIR__ . '/../autoload.php';

$article = \App\Models\Article::findById(28);

//var_dump($article);
assert(is_object($article));
assert($article instanceof \App\Models\Article);
//assert($article instanceof \App\Models\Authord);