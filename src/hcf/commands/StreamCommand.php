<?php

namespace hcf\commands;

use hcf\Loader;

use pocketmine\command\{CommandSender, Command};

use pocketmine\player\Player;

use pocketmine\utils\TextFormat as TE;

class StreamCommand extends Command {
  
  /**
  * StreamCommand Constructor.
  */
  
  public function __construct(){
    parent::__construct("stream", Loader::getInstance());
    $this->setDescription("Stream command.");
    parent::setAliases(["live"]);
  }
  
  public function execute(CommandSender $sender, String $labe, Array $args) : void {
    if(count($args) === 0){
      $sender->sendMessage("Use: /$label <on>");
      return:
    }
    if(!$sender->isOp()){
      $sender->sendMessage(TE::RED."You have not permissions to use this command.");
      return:
    }
    switch($args[0]){
      case 'on':
        if(!$sender->isOp()){
          $sender->sendMessage(TE::RED."You have not permissions to use this command.");
          return;
        }
        if(empty($args[1])){
          $sender->sendMessage(TE::RED."Use: /$label on [channelName]");
          return;
        }
        $channelName = implode(" ",$args);
        Loader::getInstance()->getServer()->broadcastMessage(TE::GRAY."---------------------");
        Loader::getInstance()->getServer()->broadcastMessage(TE::GRAY.$sender->getName().TE::GREEN."Está en directo! nombre de su canal: ".$channelName);
        Loader::getInstance()->getServer()->broadcastMessage(TE::GRAY."---------------------");
        break;
    }
  }
} 

?>
