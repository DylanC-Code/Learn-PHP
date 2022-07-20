<?php

$router = new App\Router\Router($_GET['url']);

// Tasks Routes
$router->get('/', 'Task~display');
$router->get('/add-task', 'Task~addModal');
$router->post('/add-task', 'Task~add');
$router->get('/add-again', 'Task~addAgain');
$router->get('/delete-task', 'Task-deleteModal');
$router->post('/delete-task', 'Task-delete');

// Users Routes
$router->get('/login', 'User~loginForm');
$router->post('/login', 'User~login');
$router->get('/register', 'User~registerForm');
$router->post('/register', 'User~register');
$router->get('/succes', 'User~succes');


$router->run();
