<?php

namespace hcf\faction;

use hcf\Loader;
use hcf\PlayerHCF;
use hcf\translation\Translation;
use hcf\provider\SQLite3Provider;

class Faction 
{
  
  public static function init(): void 
  {
    if (empty($this->getFactions())) {
      return;
    }
  }
 
  public function getFactions()
  {
    
  }
  
  public function isFactionExists()
  {
    
  }
  
  public function getPlayers()
  {
    
  }
  
  public function create(Player $player, string $factionName)
  {
    if ($this->isFactionExists($factionName)) {
      return;
    }
    $this->joinToFaction($player->getName(), $factionName);
    $this->setDTR($factionName, 3);
    $player->sendMessage(Translation::addMessage("", []));
    Loader::getInstance()->getServer();
  }
  
  public function remove(string $factionName)
  {
    
  }
  
  public function joinToFaction(string $username, string $factionName, string $factionRank = PlayerHCF::LEADER)
  {
    $db = SQLite3Provider::getDatabase()->prepare("INSERT OR REPLACE INTO players(username, factionName, factionRank) VALUES (:username, :factionName, :factionRank);");
    $db->bindValue(":username", $username);
    $db->bindValue(":factionName", $factionName);
    $db->bindValue(":factionRank", $factionRank);
    $db->execute();
  }
  
  public function removeToFaction()
  {
    
  }
  
  public function setDTR(string $factionName, int $dtr)
  {
    
  }
  
  public function deleteDTR(string $factionName)
  {
    
  }
  
}
