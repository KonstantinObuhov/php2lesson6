<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Exceptions\DataException;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->view->news = Article::findAll();
        echo $this->view->render(
            __DIR__ . '/../Templates/index.php'
        );
    }

    public function actionOne()
    {
        if (false === $this->view->article = Article::findById($_GET['id'])) {
            throw new DataException('Ошибка 404 - не найдено!');
        }
        echo $this->view->render(
            __DIR__ . '/../Templates/article.php'
        );
    }

}