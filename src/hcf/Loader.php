<?php

namespace HCF;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use libs\invmenu\InvMenuHandler;
 
 class Loader extends PluginBase {
   
   public const PLUGIN_VERSION = "0.1.9";
   
   public static Loader $instance;
   
   public function onEnable(): void
   {
    if (!InvMenuHandler::isRegistered()) {
      InvMenuHandler::register($this);
    }
    $this->getLogger()->info("=========================================="); 
    $this->getLogger()->info("==========================================");
    //$this->getServer()->getNetwork()->setName(str_replace(["&"], ["§"], Loader::getConfiguration("config")->get("server-name")));
   }
   
}