<?php

namespace App;

class Autoloader
{
  static function register()
  {
    spl_autoload_register([
      __CLASS__,
      'autoload'
    ]);
  }

  static function autoload($class)
  {
    $path = explode('\\', $class);
    array_shift($path);
    $fichier = ROOT . '/' . join('/', $path) . '.php';

    if (file_exists($fichier)) require_once $fichier;
    else return new \Exception('File doesn\'t exist !');
  }
}
