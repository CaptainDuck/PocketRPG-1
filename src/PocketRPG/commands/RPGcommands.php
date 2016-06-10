<?php
namespace PocketRPG\commands;

use PocketRPG\Main;
use Pocketmine\item\Item;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;

class RPGcommands extends PluginBase implements CommandExecutor{
  
  public function onCommand(CommandSender $p, Command $cmd, $label, array $args) {
    switch(strtolower($cmd->getName())) {
      case "rpg":
        switch(strtolower($args[0])) {
          case "start":
            switch(strtolower($args[1])) {
          case "mage":
            if($p->hasPermission("class.chosen")) {
              $p->sendMessage(TF:: RED . "You have already picked a class!");
            } else {
              $p->sendMessage(TF:: AQUA . "You have joined the world as a mage!");
              $wand = Item::get(Item::STICK, 0, 1);
              $p->getInventory->addItem($wand);
              $p->setPermission("class.chosen");
              $p->setPermission("class.mage");
              $p->switchLevel($cfglevel);
            }
            return true;
            break;
            
          case "warrior":
            if($p->hasPermission("class.chosen")) {
              $p->sendMessage(TF:: RED . "You have already picked a class!");
            } else {
              $p->sendMessage(TF:: AQUA . "You have joined the world as a warrior!");
              $sword = Item::get(Item::IRON_SWORD, 0, 1);
              $p->getInventory->addItem($sword);
              $p->setPermission("class.chosen");
              $p->setPermission("class.warrior");
              $p->switchLevel($cfglevel);
            }
            return true;
            break;
            
          case "tanker":
            if($p->hasPermission("class.chosen")) {
              $p->sendMessage(TF:: RED . "You have already picked a class!");
            } else {
              $p->sendMessage(TF:: AQUA . "You have joined the world as a tanker!");
              $shield = Item::get(Item::MINECART, 0, 1);
              $p->getInventory->addItem($shield);
              $p->setPermission("class.chosen");
              $p->setPermission("class.tanker");
              $p->switchLevel($cfglevel);
            }
            return true;
            break;
   
          case "archer":
            if($p->hasPermission("class.chosen")) {
              $p->sendMessage(TF:: RED . "You have already picked a class!");
            } else {
              $p->sendMessage(TF:: AQUA . "You have joined the world as an archer!");
              $bow = Item::get(Item::BOW, 0, 1);
              $arrows = Item::get(Item::ARROW, 0, 128);
              $p->getInventory->addItem($bow);
              $p->getInventory->addItem($arrows);
              $p->setPermission("class.chosen");
              $p->setPermission("class.archer");
              $p->switchLevel($cfglevel);
            }
            return true;
            break;
  
          case "assassin":
            if($p->hasPermission("class.chosen")) {
              $p->sendMessage(TF:: RED . "You have already picked a class!");
            } else {
              $p->sendMessage(TF:: AQUA . "You have joined the world as an assassin!");
              $cloak = Item::get(Item::CLOCK, 0, 1);
              $knife = Item::get(Item::FEATHER, 0, 1);
              $p->getInventory->addItem($knife);
              $p->getInventory->addItem($cloak);
              $p->setPermission("class.chosen");
              $p->setPermission("class.assassin");
              $p->switchLevel($cfglevel);
            }
            return true;
            break;
          }
          break;
          
          case "reset":
           if($p->hasPermission("rpg.reset")) {
            $p->sendMessage(TF:: GREEN . "Data reset succesfully!");
            $p->unsetPermission("rpg.reset");
            $p->unsetPermission("quest.1.completed");
            $p->unsetPermission("quest.2.completed");
            $p->unsetPermission("quest.3.completed");
            $p->unsetPermission("quest.4.completed");
            $p->unsetPermission("quest.5.completed");
            $p->unsetPermission("quest.6.completed");
            $p->unsetPermission("quest.7.completed");
            $p->unsetPermission("quest.8.completed");
            $p->unsetPermission("quest.9.completed");
            $p->unsetPermission("quest.10.completed");
            $p->setExpLevel(0);
            $p->getInventory()->clearAll();
           } else {
            $p->sendMessage(TF:: RED . "Are you sure you want to end your adventure? This will reset ALL your quest data. (All items too!)");
            $p->setPermission("rpg.reset");
           }
           return true;
          break;
        }
      break;
    }
  }
}
