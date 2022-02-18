<?php

namespace hcf;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use libs\invmenu\InvMenuHandler;
 
 class Loader extends PluginBase {
   
   public const PLUGIN_VERSION = "0.2.3";
   
   public static Loader $instance;
   
   public function onLoad(): void 
   {
     if (self::PLUGIN_VERSION !== $this->getDescription()->getVersion()) {
      $this->getLogger()->error("Please don't change the PLUGIN_VERSION constant, that helps us investigate plugin errors, thanks");
      $this->getLogger()->warning("Any changes you make to the plugin version will not be supported by us.");
     $this->getServer()->getPluginManager()->disablePugin($this);
     }
   }
   
   public function onEnable(): void
   {
     if (!InvMenuHandler::isRegistered()) {
      InvMenuHandler::register($this);
     }
     $this->getLogger()->info("=========================================="); 
     $this->saveDefaultConfig();
     $this->getLogger()->notice("Plugin enabled!!");
     $this->getLogger()->info("==========================================");
     $this->getServer()->getNetwork()->setName(str_replace(["&"], ["§"], $this->getConfig()->get("server-name")));
   }
   
   public static function getInstance(): Loader
   {
     return self::$instance;
   }
   
}