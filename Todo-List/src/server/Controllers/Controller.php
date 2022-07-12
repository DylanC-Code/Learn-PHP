<?php

namespace App\Controllers;

abstract class Controller
{
  protected $index;

  abstract public function start();

  protected function render(string $view, array $datas = [])
  {
    // foreach ($datas as $data)
    //   if (gettype($data) == "object") extract($data);
    extract($datas);

    ob_start();

    require_once ROOT . "/Views/$view.php";

    $content = ob_get_clean();

    require_once ROOT . '/Views/default.php';
  }
}
