<?php

namespace App\Controllers;

class HomeController extends Controller
{
  public function __construct($index)
  {
    $this->index = $index;
  }

  public function start()
  {
    $today = date("d F Y");

    $this->render('task', ['day' => $today]);
  }
}
