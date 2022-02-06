<?php

namespace hcf\commands;

use hcf\HCF;
use hcf\PlayHCF;

use pocketmine\item\{Item, Armor, Tool};

use pocketmine\utils\TextFormat as TE;
use pocketmine\command\{CommandSender, PluginCommand};

class RepairCommand extends PluginCommand {
	
	/**
	 * RepairCommand Constructor.
	 */
	public function __construct(){
		parent::__construct("fix", Loader::getInstance());

		parent::setPermission("fixall.use");
		parent::setDescription("Can repair the items in your Inventory "); 
		/** 
		 * luego Lo sigo si alguien quiere seguirlo no problemaxd 
		 */
	}
}
