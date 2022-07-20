<?php

namespace App\Tools;

class Session
{
  static function isConnect(): bool
  {
    if (session_status() == PHP_SESSION_NONE) session_start();
    return !empty($_SESSION['connecte']);
  }

  static function disconnect(): void
  {
    unset($_SESSION['connecte'], $_SESSION['id']);
  }
}
