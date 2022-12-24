<?php

namespace App\System\Http;

use App\Exceptions\TemplateNotExist;

class ResponseHtml implements Response {

  private string $template;
  private array $data;

  /**
   * @param string $template
   * @param array $data
   */
  public function __construct(string $template, array $data) {
    $this->template = $template;
    $this->data = $data;
  }

  public function show(): string {
    $template = \Config::ROOT_DIR . '/templates/' . $this->template . '.php';
    if (!file_exists($template)) {
      throw new TemplateNotExist();
    }

    ob_start();
    $data = $this->data;
    include_once $template;
    $response = ob_get_contents();
    ob_end_clean();

    return $response;
  }

  public function header(): void {

  }

}
