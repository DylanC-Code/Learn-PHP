<?php

$router = new App\Router\Router($_GET['url']);

$router->get('/movie/:id', 'Home~start');

$router->run();
