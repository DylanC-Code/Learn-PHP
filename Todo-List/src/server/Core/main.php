<?php

$router = new App\Router\Router($_GET['url']);

$router->get('/', 'Home~start');
$router->get('/add-task', 'Home~taskModal');
$router->get('/add-again', 'Home~addAgain');
$router->post('/add-task', 'Home~addTask');

$router->get('/login', 'User~loginForm');
$router->post('/login', 'User~login');
$router->get('/register', 'User~registerForm');
$router->post('/register', 'User~register');

$router->get('/succes', 'User~succes');

$router->run();
