<?php

namespace PocketRPG\quests;

use PocketRPG\Main;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\Level;

class QuestCommands extends Main {

  public function onCommand(CommandSender $p, Command $cmd, $label, array $args) {
    if(strtolower($cmd->getName() == "quest")) {
      if(!$p instanceof Player) {
        $p->sendMessage(TF:: RED . "You can only use this command in game!");
      } else {
        switch(strtolower($args[0])) {
          case "list":
            switch(strtolower($args[1])) {
              case "1":
                
            }
        }
      }
    }
  }
}
