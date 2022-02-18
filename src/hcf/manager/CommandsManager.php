<?php 

namespace: hcf/manager;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandMap;

class CommandRegistery{
    
    public static function init(): void{
    $Loader->getServer()->getCommandMap()->register("Fixall", new RepairCommand("Fixall",$Loader)); 

  
