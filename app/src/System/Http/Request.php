<?php

namespace App\System\Http;

final class Request {

  private array $query;

  /**
   * @param array $query
   */
  public function __construct(array $query) {
    $this->query = $query;
  }

  public static function init(): self {
    return new self($_GET);
  }

  public function get(string $name, mixed $default = ''): string {
    return $this->query[$name] ?? $default;
  }

  public function getInt(string $name, int $default = 0): int {
    return (int)$this->query[$name] ?? $default;
  }

}
