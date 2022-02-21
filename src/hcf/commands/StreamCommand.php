<?php

namespace hcf\commands;

use hcf\Loader;

use pocketmine\command\{CommandSender, Command};

use pocketmine\utils\TextFormat as TE;

use libs\discord\Webhook;
use libs\discord\Message;
use libs\discord\Embed;

class StreamCommand extends Command {

    public function __construct(){

        parent::__construct("stream", Loader::getInstance());

        

        parent::setAliases(["live"]);

        parent::setPermission("stream.command.use");

        parent::setDescription("an exclusive command for streamers");

    }

    public function execute(CommandSender $sender, String $label, Array $args) : void {

        if(!$sender->hasPermission("stream.command.use")){

            $sender->sendMessage(TE::RED."You have not permissions to use this command");

            return;

        }

        if(empty($args[0])) {

                $sender->sendMessage(TE::RED . "Use: /{$label} <message>");

                return;

        }

        $channelName = implode(" ", $args);
        $this->sendWebhook($alert, $sender->getName());

        Loader::getInstance()->getServer()->broadcastMessage("§5---------------------------------------------");
    Loader::getInstance()->getServer()->broadcastMessage("§l§d".$sender->getName()." §l§eEstá en directo! Su canal::"."\n §d".$channelName);
    Loader::getInstance()->getServer()->broadcastMessage("§5---------------------------------------------");

     public function sendWebhook(String $message, String $playerSender){
        $webhook = new Webhook("");
        $msg = new Message();

        $msg->setUsername("HCF-CORE");

        $embed = new Embed();

        $embed->setTitle("New stream for ".$playerSender);
        $embed->setDescription($playerSender." está en stream! Su canal es: ".$message);

        $msg->addEmbed($embed);

        $webhook->send($msg);
    }

    }
