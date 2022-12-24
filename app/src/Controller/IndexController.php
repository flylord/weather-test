<?php

namespace App\Controller;

use App\System\Attributes\Route;
use App\System\Http\Response;
use App\System\Http\ResponseHtml;

class IndexController {

  #[Route('/', methods: ['GET'])]
  public function index(): Response {
    $args = [];

    return new ResponseHtml('index', $args);
  }


}
