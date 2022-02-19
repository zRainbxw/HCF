<?php

namespace hcf\manager;

use hcf\Loader;

use hcf\commands\GiveMoneyCommand;
use hcf\commands\LFFCommand;
use hcf\commands\MyMoneyCommand;

use pocketmine\player\Player;

use pocketmine\utils\TextFormat as TE;

class CommandsManager {

    /**
    * @return void
    */
    public static function init() : void {
        Loader::getInstance()->getServer()->getCommandMap()->register("/givemoney", new GiveMoneyCommand());
        
        Loader::getInstance()->getServer()->getCommandMap()->register("/lff", new LFFCommand());
        Loader::getInstance()->getServer()->getCommandMap()->register("/money", new MyMoneyCommand());
    }
}
