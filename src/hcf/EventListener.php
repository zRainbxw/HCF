<?php

namespace hcf;

use hcf\Loader;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Listeners 
{
  
  /** @var Loader **/
  private Loader $loader;
  
  public function __construct(Loader $main)
  {
    $this->loader = $main;
  }
  
  public function init(): void
  {
  $loader = $this->loader;
  $loader->getServer()->getPluginManager()->registerEvents(new PlayerListener(), $loader);
  }
  
}
