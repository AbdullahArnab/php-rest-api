<?php

require __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/users', function () {
    return 'Users';
});

$app->router->get('/contact', 'contact');


$app->run();