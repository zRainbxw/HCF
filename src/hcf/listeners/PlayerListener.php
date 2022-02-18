<?php

namespace hcf\listeners;

use pocketmine\event\{
  Listener,
  player\PlayerJoinEvent,
  player\PlayerQuitEvent\
  player\PlayerInteracgEvent,
  player\PlayerCreationEvent
};

use pocketmine\Server;

use hcf\PlayerHCF;

class PlayerListener extends Listener 
{
  
  public function joinEvent(PlayerJoinEvent $event): void
  {
    $player = $event->getPlayer();
  }
  
  public function quitEvent(PlayerQuitEvent $event): void
  {
    $player = $event->getPlayer();
  }
  
  public function creation(PlayerCreationEvent $event): void 
  {
    if ($event->getPlayerClass() === PlayerHCF) {
      return;
    }
    $event->setPlayerClass(PlayerHCF::class);
  }
  
}