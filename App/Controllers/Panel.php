<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\MultiException;
use App\Exceptions\DataException;

class Panel
    extends Controller
{

    public function actionDefault()
    {
        $this->view->news = Article::findAll();
        echo $this->view->render(
            __DIR__ . '/../../Panel/NewsTemplatePanel.php'
        );
    }

    public function actionEdit()
    {
        if (isset($_GET['id'])) {
            if (false === $this->view->article = Article::findById($_GET['id'])) {
                throw new DataException('Ошибка 404 - не найдено!');
            }
        } else {
            $this->view->article = new Article;
        }
        echo $this->view->render(
            __DIR__ . '/../../Panel/EditorTemplate.php'
        );
    }

    public function actionSave()
    {
        if (isset($_POST['id'])) {
            if (false === $article = Article::findById($_POST['id'])) {
                throw new DataException('Ошибка 404 - не найдено!');
            }
        } else {
            $article = new Article;
        }

        $save_status = true;

        try {
            $article->fill($_POST);
        } catch (MultiException $errors) {
            $this->view->errors = $errors;
            $this->view->article = $article;
            echo $this->view->render(
                __DIR__ . '/../../Panel/EditorTemplate.php'
            );
            $save_status = false;
        }

        if ($save_status) {
            $article->save();
            $this->sendRedirect('/Panel/');
        }
    }

    public function actionDel()
    {
        $article = Article::findById($_GET['id']);
        $article->delete();
        $this->sendRedirect('/Panel/');
    }
}