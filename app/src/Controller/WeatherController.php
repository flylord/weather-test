<?php

namespace App\Controller;

use App\System\Attributes\Route;

class WeatherController {

  #[Route('/weather/get', methods: ['GET'])]
  public function get() {
    echo __FUNCTION__;
  }

}
