<?php

namespace App\Router;

class Router
{
  private $url;
  private $routes;

  public function __construct($url)
  {
    $this->url = trim($url, '/');
  }

  public function get($path, $action)
  {
    $route = new Route($path, $action);
    $this->routes['GET'][] = $route;
    return $route;
  }

  public function run()
  {
    $method = $_SERVER['REQUEST_METHOD'];

    if (!isset($this->routes[$method]))
      throw new RouterException("No routes matching this request method '$method'");

    foreach ($this->routes[$method] as $route)
      if ($route->match($this->url)) return $route->call();

    throw new RouterException("No route matching with this url");
  }
}
