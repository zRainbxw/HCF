<?php

namespace hcf\manager;

use pocketmine\utils\SingletonTrait;

use hcf\Loader;
use hcf\PlayerHCF;

class FactionManager 
{
  use SingletonTrait;
  
  public const OWNER = "Owner";
  
  public const DTR_MAX = Loader::getInstance()->getConfig("faction")["maxPlayers"] . .5;
  public const DTR_REGENERATE_TIME = 3600;
  
  public array $factions; 
  
  public function getFactions(): array
  {
    return $this->factions;
  }
  
  public function isFaction(string $name): bool
  {
    return (isset($this->factions[$name])) ? true : false;
  }
  
  public function getFaction(string $name): Faction
  {
    return ($this->factions[$name] instanceof Faction) ? $this->factions[$name] : null;
  }
  
  public function createFaction(string $name, PlayerHCF $owner): void
  {
    if ($this->isFaction($name)) {
      return;
    }
    // code.. (SQLite3)
    $username = $owner->getName();
    /** @function Set the player role for the faction **/
    $owner->setFactionRole(self::OWNER);
    /** @var Faction(factionName, positionHome, membersArray, balanceInt, dtrFloat) **/
    $this->factions[$name] = new Faction($name, null, [$username], 0, self::DTR_MAX);
    $owner->setFaction($this->factions[$name]);
  }
  
  public function deleteFaction(string $name): void
  {
    if (!$this->isFaction($name)) {
      return;
    }
    $faction = $this->factions[$name];
    foreach($faction->getMembers() as $player) {
      $player->setFaction(null);
      $player->setFactionRole(null);
    }
    unset($faction);
  }
  
}
