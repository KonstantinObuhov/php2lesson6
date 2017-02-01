<?php

namespace App;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access(): bool
    {
        return true;
    }

    public function action($name)
    {
        if ($this->access()) {
            $action = 'action' . $name;
            $this->$action();
        } else {
            die('Нет доступа');
        }
    }

    public function sendRedirect($url)
    {
        header('Location: ' . $url);
    }

    public function showErrorPage($error)
    {
        $this->view->error = $error;
        echo $this->view->render(
            __DIR__ . '/Templates/error.php'
        );
    }

}