<?php

namespace App\Controller;

use App\Repository\CityFactory;
use App\Services\WeatherFactory;
use App\System\Attributes\Route;
use App\System\Http\ResponseJson;

final class WeatherController {

  #[Route('/weather/get', methods: ['GET'])]
  public function get(): ResponseJson {
    $args = [];

    /*
     * TODO: sanitize && validate
     */
    $cityName = $_GET['city'];

    $cs = CityFactory::get();
    $ws = WeatherFactory::get();

    $cities = $cs->findSimilar($cityName);
    $args['weather'] = $ws->getByCities($cities);
//    var_dump($args['weather']);
//
//    die();

    return new ResponseJson($args);
  }

}
