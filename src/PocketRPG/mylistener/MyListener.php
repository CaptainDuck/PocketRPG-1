<?php

namespace PocketRPG\mylistener;

use PocketRPG\Main;
use pocketmine\living\Living;
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
use pocketmine\level\particle\LavaParticle;
use pocketmine\level\particle\ExplodeParticle;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\BlockBreakEvent;
use pocketmine\event\BlockPlaceEvent;

class MyListener extends Main implements Listener {
  
  public function onFight(EntityDamageEvent $event) {
    if($event instanceof EntityDamageByEntityEvent && $event->getDamager() instanceof Player) {
        $hit = $event->getEntity();
        $damager = $event->getDamager();
        $cfglevel = $this->config->get("RPG_LEVEL");
        if($this->party->get($hit) == $this->party->get($damager)) {
          $event->setCancelled();
        } elseif($damager->getLevel() == $this->getServer()->getLevelByName($cfglevel)) {
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
                $this->setDamage(getDamage() + 4);
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
                $level->addParticle(new CriticalParticle($hitpos));
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
    if($p->getLevel() == $this->getServer()->getLevelByName() == $cfglevel) {
      if($p->getItemInHand() == 347) {
        if($p->hasPermission("class.assassin")) {
        $effect = Effect::getEffect(14)->setDuration(1)->setAmplifier(1)->setVisible(true);
        $p->addEffect($effect);
      }
    } elseif($p->getItemInHand() == 328) {
        if($p->hasPermission("class.tanker")) {
        $effect = Effect::getEffect(11)->setDuration(5)->setAmplifier(2)->setVisible(true);
        $p->addEffect($effect);
        }
      }
    }
  }
  public function onBlockPlace(BlockPlaceEvent $event) {
    $cfglevel = $this->config->get("RPG_LEVEL");
    $p = $event->getPlayer();
    if($p instanceof Player) {
      if($p->getLevel() == $this->getServer()->getLevelByName($cfglevel)) {
        $event->setCancelled();
        $p->sendMessage(TF:: RED . "You are not allowed to do that here.");
      }
    }
  }
  public function onBlockBreak(BlockBreakEvent $event) {
    $p = $event2->getPlayer();
    $cfglevel = $this->config->get("RPG_LEVEL")
    if($p instanceof Player) {
      if($p->getLevel() == $this->getServer()->getLevelByName($cfglevel)) {
        $event2->setCancelled();
        $p->sendMessage(TF:: RED . "You are not allowed to do that here.");
      }
    }
  }
    public function onCraft(CraftItemEvent $event) {
    $rpglvl = $this->config->get("RPG_LEVEL");
    if($event->getPlayer()->getLevel() == $this->getServer()->getLevelByName($rpglvl)) {
      $event->setCancelled();
    }
  }
  
  public function onBurn(FurnaceBurnEvent $event2) {
    $rpglvl = $this->config->get("RPG_LEVEL");
    if($event2->getPlayer()->getLevel() == $this->getServer()->getLevelByName($rpglvl)) {
      $event2->setCancelled();
    }
  }
  
  public function onSmelt(FurnaceSmeltEvent $event3) {
    $rpglvl = $this->config->get("RPG_LEVEL");
    if($event3->getPlayer()->getLevel() == $this->getServer()->getLevelByName($rpglvl)) {
      $event3->setCancelled();
    }
  }
  
  public function onDrop(PlayerDropEvent $event4) {
    $rpglvl = $this->config->get("RPG_LEVEL");
    if($event4->getPlayer()->getLevel() == $this->getServer()->getLevelByName($rpglvl)) {
      $event4->setCancelled();
    }
  }
  
  public function onDeath(PlayerDeathEvent $event) {
    $p = $event->getPlayer();
    $rpglvl = $this->config->get("RPG_LEVEL");
    if($p->getLevel() == $this->getServer->getLevelByName($rpglvl)) {
      $p->setKeepInventory();
      $p->setKeepExperience();
    } else {
      $p->setKeepInventory(false);
      $p->setKeepExperience(false);
    }
  }
}
