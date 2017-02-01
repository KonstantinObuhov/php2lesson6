<?php

require __DIR__ . '/../autoload.php';

$article = \App\Models\Article::findById(28);
$author = $article->author;

assert(is_object($author));

$article = \App\Models\Article::findById(1200);
$author = $article->author;

assert(is_null($author));
