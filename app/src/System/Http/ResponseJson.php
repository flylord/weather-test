<?php

namespace App\System\Http;

final class ResponseJson implements Response {
  private array $data;
  private int $hasError;

  /**
   * @param array $data
   * @param bool $hasError
   */
  public function __construct(array $data, bool $hasError = false) {
    $this->data = $data;
    $this->hasError = $hasError;
  }

  public function show(): string {
    return json_encode($this->data);
  }

  public function header(): void {
    if ($this->hasError) {
      header("HTTP/1.1 400 Bad Request");
    }
    header('Content-Type: application/json; charset=utf-8');
  }

}
