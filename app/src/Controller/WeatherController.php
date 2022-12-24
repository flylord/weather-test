<?php

namespace App\Controller;

use App\System\Attributes\Route;
use App\System\Http\ResponseJson;

class WeatherController {

  #[Route('/weather/get', methods: ['GET'])]
  public function get(): ResponseJson {
    $args = [];
    return new ResponseJson($args);
  }

}
