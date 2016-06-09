<?php

namespace PocketRPG\commands;

use PocketRPG\Main;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use pocketmine\permission\Permission;
use pocketmine\Server;
use pocketmine\Player;

class PartyCommands extends Main {
    
    public function onCommand(CommandSender $p, Command $cmd, $label, array $args) {
        if($p instanceof Player) {
            switch(strtolower($cmd->getName())) {
                case "party":
                    switch(strtolower($args[0])) {
                        case "create":
                          if(isset($args[1])) {
                            $name = $p->getName();
                            if(isset($this->party->get($name))) {
                                $p->sendMessage(TF:: RED . "You are already in a party! use /party leave first!");
                            } else {
                                $p->sendMessage(TF:: AQUA . "You created a party named " . $args[1] . "!");
                                $this->party->set($name, $args[1]);
                            }
                          }
                        return true;
                        break;
                        
                        case "invite":
                            if(isset($args[1]) && $args[1] instanceof Player) {
                                $sname = $p->getName();
                                if(isset($this->party->get($args[1]))) {
                                    $p->sendMessage(TF:: RED . "The player you invited is already in a party!");
                                } else {
                                    $p->sendMessage(TF:: AQUA . "You invited the player to your party!");
                                    $args[1]->sendMessage(TF:: AQUA . "" . $sname . " has invited you to his/her party!");
                                    $partyname = $this->party->get($sname);
                                    $this->party->set($args[1], $partyname);
                                    $this->party->save();
                                }
                            } else {
                                $p->sendMessage(TF:: RED . "The player you tried to invite is not online!");
                            }
                        return true;
                        break;
                    
                        case "leave":
                            $name = $p->getName();
                            if(isset($this->party->get($name))) {
                                $p->sendMessage(TF:: RED . "You are not currently in a party!");
                            } else {
                                $pname = $this->party->get($name);
                                unset($pname);
                                $this->party->save();
                                $p->sendMessage(TF:: AQUA . "You have left your party!");
                            }
                        return true;
                        break;
                    }
            }
        }
    }
}
