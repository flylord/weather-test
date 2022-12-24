<?php

namespace App\Controller;

use App\Services\CityFactory;
use App\Services\WeatherFactory;
use App\System\Attributes\Route;
use App\System\Http\ResponseJson;

class WeatherController {

  #[Route('/weather/get', methods: ['GET'])]
  public function get(): ResponseJson {
    $args = [];

    $cityName = $_GET['city'];

    $cs = CityFactory::get();
    $ws = WeatherFactory::get();

    $cities = $cs->find($cityName);
    var_dump($cities);

    $args['weather'] = $ws->get(51.51, -0.13);

    die();

    return new ResponseJson($args);
  }

}
