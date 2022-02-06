<?php

namespace HCF;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use libs\muqsit\invmenu\InvMenuHandler;
 
 class Loader extends PluginBase {
   
   public function onEnable(): void
    {
        
        $this->getLogger()->info("==========================================");     $this->getLogger()->info("==========================================");