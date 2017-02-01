<?php

require __DIR__ . '/autoload.php';

$logger = new App\Logger();
$parts = explode('/', $_SERVER['REQUEST_URI']);
$controllerName = $parts[1] ?: 'Index';
$actionName = $parts[2] ?: 'Default';

$controllerClass = '\\App\\Controllers\\' . $controllerName;

if (!class_exists($controllerClass)) {
    die('Контроллер не найден');
}

try {
    $controller = new $controllerClass;
    $controller->action($actionName);
} catch (\App\Exceptions\DbException $e) {
    $controller->showErrorPage($e->getMessage());
    $logger->critical($e->getMessage());
} catch (\App\Exceptions\DataException $e) {
    $controller->showErrorPage($e->getMessage());
    $logger->error($e->getMessage());
}