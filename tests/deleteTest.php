<?php

require __DIR__ . '/../autoload.php';

//Ситуации когда объект получили через статический метод класса
$article1 = \App\Models\Article::findById(16);

assert(is_bool($article1->delete()));

//Ситуация когда создали объект через динамический метод объекта поработали с ним и не сохраняя пытаемся удалить
$article2 = new \App\Models\Article();

$article2->title = 'test2 title2';
$article2->text = 'test2 text2';

assert(is_bool($article2->delete()));
assert(false == $article2->delete());

//После сохранения
$article2->save();

assert(true == $article2->save());