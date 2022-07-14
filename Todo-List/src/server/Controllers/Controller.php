<?php

namespace App\Controllers;

abstract class Controller
{
  protected $index;
  protected $connect;
  protected $content = [];

  protected function render(string $view, array $datas = [])
  {
    extract($datas);

    ob_start();

    require_once ROOT . "/Views/$view.php";

    $content = ob_get_clean();

    require_once ROOT . '/Views/default.php';
  }
}
