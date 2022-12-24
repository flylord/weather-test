<?php

namespace App\Controller;

use App\System\Attributes\Route;
use App\System\Response;
use App\System\ResponseHtml;

class IndexController {

  #[Route('/', methods: ['GET'])]
  public function index(): Response {
    $args = [];

    return new ResponseHtml('index', $args);
  }


}
