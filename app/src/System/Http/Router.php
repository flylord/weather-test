<?php

namespace App\System\Http;

use App\Exceptions\NotFoundException;
use App\System\Attributes\Route;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;

final class Router {

  private array $routes = [];
  private array $classes = [];

  public function add(string $class): void {
    if (!in_array($class, $this->classes)) {
      $this->init($class);
      $this->classes[] = $class;
    }
  }

  private function init(string $class): void {
    try {
      $R = new ReflectionClass($class);
      $methods = $R->getMethods(ReflectionMethod::IS_PUBLIC);
      foreach ($methods as $method) {
        $attribs = $method->getAttributes(Route::class);
        foreach ($attribs as $attribute) {
          $route = $attribute->newInstance();
          $this->routes[$route->getPath()] = ['class' => $class, 'method' => $method->getName()];
        }
      }

    } catch (ReflectionException) {
      throw new NotFoundException();
    }
  }

  public function run(): void {
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $path = $uri['path'];
    if (!isset($this->routes[$path])) {
      throw new NotFoundException();
    }

    try {
      $controller = (new ReflectionClass($this->routes[$path]['class']))->newInstance(Request::init());

      $view = call_user_func([$controller, $this->routes[$path]['method']]);
      $view->header();
      echo $view->show();

    } catch (ReflectionException) {
      throw new NotFoundException();
    }
  }

}
