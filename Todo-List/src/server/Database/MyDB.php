<?php

namespace App\Database;

class MyDB extends \SQLite3
{
  function __construct()
  {
    $this->open(ROOT . '/Database/db.sqlite');
  }
}
