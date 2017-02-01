<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

<?php foreach ($news as $article) { ?>
    <?php $author = $article->author; ?>
    <div>
        <h2><a href="/Index/One/?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h2>
        <p><?php echo $article->text; ?></p>
        <span>Автор: <?php echo $author->firstname . ' ' . $author->lastname; ?></span>
    </div>
<?php } ?>

</body>
</html>