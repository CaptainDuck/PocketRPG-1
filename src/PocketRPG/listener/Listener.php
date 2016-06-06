<?php

namespace PocketRPG\Listener;

use PocketRPG\Main;
use pocketmine\event\Listener;
use pocketmine\event\Event;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\level\particle\CriticalParticle;

class Listener extends Main implements Listener {
  
  public function onFight(EntityDamageEvent $event) {
    if($event instance EntityDamageByEntityEvent && $event->getDamager() instanceof Player) {
        $hit = $event->getEntity();
        $damager = $event->getDamager();
        $cfglevel = $this->config->get("RPG_LEVEL");
        if($damager->getLevelByName() == $cfglevel) {
            if($p->hasPermission("class.assassin")) {
                if($damager->getItemInHand()->getId() == 388) {
                $x = $hit->x;
                $y = $hit->y;
                $z = $hit->z;
                $hitpos = $hit->getPosition(new Vector3($x, $y, $z));
                $level->addParticle(new CriticalParticle($hitpos));
                $this->setDamage(getDamage() + 3);
                }
            } elseif($p->hasPermission("class.mage")) {
                if($damage->getItemInHand()->getId() == 280) {
                  
                }
            }
        }
    }
  }
  
}
