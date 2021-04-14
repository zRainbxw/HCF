<?php

namespace hcf;

use hcf\HCFLoad;

use pocketmine\Player;

use pocketmine\utils\{Config,TextFormat as Text};

class PlayerHCF extends Player {

public const PUBLIC_CHAT = 0;

public const FACTION_CHAT = 1;

public const ALLY_CHAT = 2;

public const STAFF_CHAT = 3;

public $hcf;

public $class = "";
public $oldClass;

public $region = "";

public $balance = 0;

public $invites = [];

public $logout = false;

public $reclaim = false;
  
public $chat = self::PUBLIC;

/** @here Scoreboard **/
public $scoreboard;

/** @var Array[] String **/
public $permissions = [];

/** @var Array[] Item **/
public $inventory = [];

/** @var Array[] Item **/
public $armorInventory = [];

public $faction;

public $factionRole;

public $kills = 0;
public $deaths = 0;

public $cooldown = ["EnderPearl" => 0];

public function addKill(int $amount):void{
$this->kills += $amount;
}

public function addDeath(int $amount):void{
$this->deaths += $amount;
}

public function setLogout(bool $value = true){
$this->logout = $value;  
}

public function getLogout(): bool {
return $this->logout ?? null;
}

public function getCooldown(string $name): int {
switch($name){
case "EnderPearl":
return (int)$this->cooldown["EnderPearl"];  
break;
     }
}
 
public function setStaffMode(bool $value = false): void {
$this->staff["enabled"] = $value;
}

public function getStaffMode(): bool {
return $this->staff["enabled"];
}

public function sendStaffMode(): void {

$this->removeAllEffects();
$this->setGamemode(0);
$this->setAllowFlight(true);
$this->setFlying(true);
$this->addTitle(Text::AQUA . "STAFFMODE", Text::GREEN . "Enabled");
}

public function notSendStaffMode(): void {
$this->getInventory()->clearAll(true);
$this->getArmorInventory()->clearAll(true);

$this->inventory = [];
$this->setGamemode(0);
$this->setAllowFlight(false);
$this->setFlying(false);
foreach(HCFLoad::getInstance()->getServer()->getOnlinePlayers() as $player){
$player->showPlayer($this);
}
$this->setStaffMode(false);
}
}