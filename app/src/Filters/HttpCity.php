<?php

namespace App\Filters;

class HttpCity {

  final public static function sanitize(string $name): string {
    $name = trim($name);
    $name = strip_tags($name);
    $name = substr($name, 0, 128);
    return filter_var($name);
  }

}
