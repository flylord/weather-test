<?php

namespace App\System\Http;

interface Response {

  public function header(): void;

  public function show(): string;

}
