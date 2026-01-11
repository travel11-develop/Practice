<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();

// route登録
require_once __DIR__ . '/../routes/web.php';

// $router->get('/', 'HomeController@index');

$router->dispatch();
