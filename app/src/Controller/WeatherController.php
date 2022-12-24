<?php

namespace App\Controller;

use App\Repository\CityRepositoryFactory;
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

    $cs = CityRepositoryFactory::get();
    $ws = WeatherFactory::get();

    $cities = $cs->findSimilar($cityName);
    $args['weather'] = $ws->getByCities($cities);
//    var_dump($args['weather']);
//
//    die();

    return new ResponseJson($args);
  }

}
