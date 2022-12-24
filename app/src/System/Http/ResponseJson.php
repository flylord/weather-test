<?php

namespace App\System\Http;

class ResponseJson implements Response {
  private array $data;

  /**
   * @param array $data
   */
  public function __construct(array $data) {
    $this->data = $data;
  }

  public function show(): string {
    return json_encode($this->data);
  }

  public function header(): void {
    header('Content-Type: application/json; charset=utf-8');
  }

}
