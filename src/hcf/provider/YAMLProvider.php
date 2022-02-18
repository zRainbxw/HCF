<?php

namespace hcf\provider;

use pocketmine\utils\Config;

use hcf\Loader;

class YAMLProvider {
  
  /** @here HCFLoad **/ 
  public $loader;

  public function __construct(Loader $main)
  {
  $this->loader = $main;
  $this->init();
  }

  public function init(): void 
  {
    if ($this->loader->getDataFolder()) {
      @mkdir($this->loader->getDataFolder());
    }
  }

}
?>
