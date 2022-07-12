<?php

namespace App\Router;

class Route
{
  private $path;
  private $action;
  private $matches;

  public function __construct($path, $action)
  {
    $this->path = trim($path, '/');
    $this->action = $action;
  }

  public function match($url)
  {
    $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
    $regex = "#^$path$#i";
    if (!preg_match($regex, $url, $matches)) return false;

    array_shift($matches);

    $this->matches = $matches[0];

    return true;
  }

  public function call()
  {
    $params = explode('~', $this->action);

    $controller = "App\\Controllers\\" . $params[0] . 'Controller';
    $method = $params[1];
    $controller = (new $controller($this->matches))->$method();
  }
}
