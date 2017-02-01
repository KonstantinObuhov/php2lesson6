<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
</head>
<body>
<a href="/Panel/Edit/">Создать новую новость</a>
<?php foreach ($news as $article) { ?>
    <div class="article">
        <h3 class="title"><?php echo $article->title; ?></h3>
        <div class="text"><?php echo $article->text; ?></div>
        <a href="/Panel/Edit/?id=<?php echo $article->id; ?>">Редкатирова</a>
        <a href="/Panel/Del/?id=<?php echo $article->id; ?>">Удалить</a>
    </div>
<?php } ?>
</body>
</html>
