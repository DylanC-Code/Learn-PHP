<?php

use App\Autoloader;

define('ROOT', dirname(__DIR__));

require_once ROOT . "/Autoloader.php";
Autoloader::register();

require_once ROOT . "/Core/main.php";
