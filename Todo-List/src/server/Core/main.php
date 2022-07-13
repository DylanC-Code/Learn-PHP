<?php

$router = new App\Router\Router($_GET['url']);

$router->get('/', 'Home~start');
$router->get('/add-task', 'Home~taskModal');
$router->get('/add-again', 'Home~addAgain');
$router->post('/add-task', 'Home~addTask');

$router->run();
