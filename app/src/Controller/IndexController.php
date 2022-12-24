<?php

namespace App\Controller;

use App\System\Attributes\Route;
use App\System\Http\Response;
use App\System\Http\ResponseHtml;

final class IndexController extends Controller {

  #[Route('/')]
  public function index(): Response {
    $args = [];

    return new ResponseHtml('index', $args);
  }


}
