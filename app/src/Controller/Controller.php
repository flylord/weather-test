<?php

namespace App\Controller;

use App\System\Http\Request;

abstract class Controller {

  protected Request $request;

  /**
   * @param Request $request
   */
  public function __construct(Request $request) {
    $this->request = $request;
  }


}
