<?php

namespace hcf;

use hcf\Loader;

class Listeners 
{
  
  /** @var Loader **/
  private Loader $loader;
  
  public function __cosntruct(Loader $main)
  {
    $this->loader = $main;
  }
  
  public function init(): void
  {
  $loader = $this->loader;
  $loader->getServer()->getPluginManager()->registerEvents(new PlayerListener(), $loader);
  }
  
}