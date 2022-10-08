<?php

#=========================================================================================================================#

namespace EnderCrystal;

#=========================================================================================================================#

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;

#=========================================================================================================================#

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;

#=========================================================================================================================#

use EnderCrystal\Item\EndCrystal;
use EnderCrystal\Entity\EnderCrystal;

#=========================================================================================================================#

class Main extends PluginBase {

#=========================================================================================================================#

    public function onEnable(): void {
     $this->getLogger()->info("Plugin EnderCrystal Buatan MCCreeperYT Dan ZulfahmiFjr");
     ItemFactory::registerItem(new EndCrystal());
     Item::initCreativeItems();
     if(!Entity::registerEntity(EnderCrystal::class, false, ["EnderCrystal"])) {
     }
     if($this->getDescription()->getAuthors()[0] !== "MCCreeperYT Dan ZulfahmiFjr"){
      $this->getLogger()->info("Plugin EnderCrystal Buatan MCCreeperYT Dan ZulfahmiFjr");
      $this->getServer()->shutdown();
     }
  }
}
 #=========================================================================================================================#