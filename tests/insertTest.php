<?php

require __DIR__ . '/../autoload.php';

//Ситуации когда объект получили через статический метод класса
$article1 = \App\Models\Article::findById(1);


$article1->title = 'test1 title1';
$article1->text = 'test1 text1';
assert(is_bool($article1->save()));

//Ситуация когда создали объект через динамический метод объекта
$article2 = new \App\Models\Article();

$article2->title = 'test2 title2';
$article2->text = 'test2 text2';
assert(is_object($article2->save()));

