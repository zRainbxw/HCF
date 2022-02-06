<?php

namespace hcf;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase
{

  public function onEnable(): void
  {
  $this->getLogger()->info("Test");
  }

}
