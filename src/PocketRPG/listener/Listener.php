<?php

namespace PocketRPG\Listener;

use PocketRPG\Main;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
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
use pocketmine\event\player\PlayerItemHeldEvent;

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
                $x = $hit-r>x;
                $y = $hit->y;
                $z = $hit->z;
                $hitpos = $hit->getPosition(new Vector3($x, $y, $z));
                $level->addParticle(new LavaParticle($hitpos));
                $this->setKnockBack(1);
                $hit->setOnFire(4);
                $this->setDamage(getDamage() + 4)
              }
            } elseif($p->hasPermission("class.tanker")) {
              if($damager->getItemInHand()->getId() == 328) {
                $x = $hit->x;
                $y = $hit->y;
                $z = $hit->z;
                $hitpos = $hit->getPosition(new Vector3($x, $y, $z));
                $level->addParticle(new ExplodeParticle($hitpos));
                $this->setKnockBack(3);
                $this->setDamage(getDamage() + 2);
              }
            } elseif($p->hasPermission("class.warrior")) {
              if($damager->getItemInHand()->getId() == 267) {
                $x = $hit->x;
                $y = $hit->y;
                $z = $hit->z;
                $hitpos = $hit->getPosition(new Vector3($x, $y, $z));
                $level->addParticle(new CritialParticle($hitpos));
                $this->setKnockBack(2);
                $this->setDamage(getDamage() + 6);
              }
            }
        }
    }
  }
  public function onItemHeld(PlayerItemHeldEvent $event) {
    $p = $event->getPlayer();
    $cfglevel = $this->config->get("RPG_LEVEL");
    if($p->getLevelByName == $cfglevel) {
      if($p->getItemInHand() == 347) {
        if($p->hasPermission("class.assassin")) {
        $effect = Effect::getEffect(14)->setDuration(1)->setAmplifier(1)->setVisible(true);
        $p->addEffect($effect);
      }
    }
  }
}
