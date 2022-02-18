<?php

/**
*   __  __  ____     ____           ____     _____   ____    ____      
*  /\ \/\ \/\  _`\  /\  _`\        /\  _`\  /\  __`\/\  _`\ /\  _`\    
*  \ \ \_\ \ \ \/\_\\ \ \L\_\      \ \ \/\_\\ \ \/\ \ \ \L\ \ \ \L\_\  
*  \ \  _  \ \ \/_/_\ \  _\/_______\ \ \/_/_\ \ \ \ \ \ ,  /\ \  _\L  
*   \ \ \ \ \ \ \L\ \\ \ \//\______\\ \ \L\ \\ \ \_\ \ \ \\ \\ \ \L\ \
*    \ \_\ \_\ \____/ \ \_\\/______/ \ \____/ \ \_____\ \_\ \_\ \____/
*     \/_/\/_/\/___/   \/_/           \/___/   \/_____/\/_/\/ /\/___/ 
*
**/

namespace hcf;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use libs\invmenu\InvMenuHandler;
 
 class Loader extends PluginBase {
   
   public const PLUGIN_VERSION = "0.4.1";
   
   public static Loader $instance;
   
   public function onLoad(): void 
   {
     if (self::PLUGIN_VERSION !== $this->getDescription()->getVersion()) {
      $this->getLogger()->error("Please don't change the `plugin.yml` version, that helps us investigate plugin errors, thanks");
      $this->getLogger()->warning("Any changes you make to the plugin version will not be supported by us.");
     $this->getServer()->getPluginManager()->disablePugin($this);
     }
   }
   
   public function onEnable(): void
   {
     if (!InvMenuHandler::isRegistered()) {
      InvMenuHandler::register($this);
     }
     $this->saveDefaultConfig();
     $this->getServer()->getNetwork()->setName(str_replace("&", "§", $this->getConfig()->get("server-name")) . "§r | " . $this->getConfig()->get("server-color") . $this->getConfig()->get("server-description"));
        MysqlProvider::connect();
        SQLite3Provider::connect();
     $this->getLogger()->info("=========================================="); 
     $this->getLogger()->notice("
 **      **   ******  ********         ******    *******   *******   ********
/**     /**  **////**/**/////         **////**  **/////** /**////** /**///// 
/**     /** **    // /**             **    //  **     //**/**   /** /**      
/**********/**       /*******  *****/**       /**      /**/*******  /******* 
/**//////**/**       /**////  ///// /**       /**      /**/**///**  /**////  
/**     /**//**    **/**            //**    **//**     ** /**  //** /**      
/**     /** //****** /**             //******  //*******  /**   //**/********
//      //   //////  //               //////    ///////   //     // //////// 
");
     $this->getLogger()->notice("Plugin enabled!!");
     $this->getLogger()->info("==========================================");
     
$this->getServer()->getNetwork()->setName(str_replace(["&"], ["§"], Loader::getConfiguration("config")->get("Motd")));

    
   }
   
   public static function getInstance(): Loader
   {
     return self::$instance;
   }
     /**
     * @return void
     */
    public function onDisable() : void {
        SQLite3Provider::disconnect();
        MysqlProvider::disconnect();

    }
   
}
