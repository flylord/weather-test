<?php

namespace App\System\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
class Route {

  private ?string $path;
  private ?string $name = null;
  private array $methods;

  /**
   * @param string[] $methods
   */
  public function __construct(string $path, string $name = null, array $methods = []) {
    $this->path = $path;
    $this->name = $name;
    $this->setMethods($methods);
  }

  /**
   * @return string
   */
  public function getPath(): string {
    return $this->path;
  }

  /**
   * @return string|null
   */
  public function getName(): ?string {
    return $this->name;
  }

  public function setMethods(array $methods = []): void {
    $this->methods = $methods;
  }

  public function getMethods(): array {
    return $this->methods;
  }


}
