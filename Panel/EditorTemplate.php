<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать|Сохранить новость</title>
</head>
<body>
<?php if (isset($errors)): ?>
    <ul style="color:red;">
        <?php foreach ($errors as $error): ?>
            <li><?php echo $error->getMessage(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<form action="/Panel/Save" method="post">
    <?php if (!$article->isNew()): ?>
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
    <?php endif; ?>
    <input type="hidden" name="author_id" value="<?php echo $article->author_id; ?>">
    <div>
        <lable for="title">Название статьи</lable>
        <input id="title" name="title" type="text" value="<?php echo $article->title; ?>">
    </div>
    <div>
        <lable for="text">Текст статьи</lable>
        <textarea id="text" name="text" type="text"><?php echo $article->text; ?></textarea>
    </div>
    <button type="submit">Отправить</button>
</form>
</body>
</html>