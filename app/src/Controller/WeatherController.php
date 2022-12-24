<?php

namespace App\Controller;

use App\Filters\HttpCity;
use App\Repository\CityRepositoryFactory;
use App\Services\WeatherFactory;
use App\System\Attributes\Route;
use App\System\Http\ResponseJson;

final class WeatherController extends Controller {

  public const ERR_EMPTY_CITY = 1;
  public const ERR_EMPTY_CITIES = 2;

  #[Route('/weather/get', methods: ['GET'])]
  public function get(): ResponseJson {
    $args = [];

    $cityName = HttpCity::sanitize($this->request->get('city'));
    if (empty($cityName)) {
      $args['error'] = self::ERR_EMPTY_CITY;
      return new ResponseJson($args, true);
    }

    $cs = CityRepositoryFactory::get();
    $ws = WeatherFactory::get();

    $cities = $cs->findSimilar($cityName);
    if ($cities->count() == 0) {
      $args['error'] = self::ERR_EMPTY_CITIES;
      return new ResponseJson($args, true);
    }

    $args['weather'] = $ws->getByCities($cities);

    return new ResponseJson($args);
  }

}
