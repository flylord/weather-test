<?php

namespace App\DTO;

use Countable;
use Iterator;

final class CityCollection implements Countable, Iterator {

  private int $position;
  private array $cities;

  public function __construct(array $cities = []) {
    $this->cities = $cities;
    $this->position = 0;
  }

  public function rewind(): void {
    $this->position = 0;
  }

  #[ReturnTypeWillChange]
  public function current(): City {
    return $this->cities[$this->position];
  }

  #[ReturnTypeWillChange]
  public function key(): int {
    return $this->position;
  }

  public function next(): void {
    ++$this->position;
  }

  public function valid(): bool {
    return isset($this->cities[$this->position]);
  }

  public function count(): int {
    return count($this->list);
  }

}
