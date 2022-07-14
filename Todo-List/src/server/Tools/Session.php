<?php

namespace App\Tools;

class Session
{
  static function isConnect()
  {
    if (session_status() == PHP_SESSION_NONE) session_start();
    return !empty($_SESSION['id']);
  }
}
