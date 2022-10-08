<?php

#=========================================================================================================================#

namespace EnderCrystal\Item;

#=========================================================================================================================#

use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\Player;

#=========================================================================================================================#

use EnderCrystal\Entity\EnderCrystal;

#=========================================================================================================================#

class EndCrystal extends Item {

#=========================================================================================================================#

    public function __construct($meta = 0, $count = 1){
     parent::__construct(Item::END_CRYSTAL, $meta, "Ender Crystal");
    }

#=========================================================================================================================#

    public function getMaxStackSize(): int{
     return 64;
    }

#=========================================================================================================================#

    public function onActivate(Player $player, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector): bool{
     if(in_array($blockClicked->getId(), [Block::OBSIDIAN, Block::BEDROCK])){
      $nbt = Entity::createBaseNBT($blockReplace->add(0.5, 0, 0.5));
      $crystal = Entity::createEntity("EnderCrystal", $player->getLevel(), $nbt);
      if($crystal instanceof EnderCrystal){
       $crystal->spawnToAll();
       if($player->isSurvival()){
        --$this->count;
       }
    }
 }
 return true;
 }
}

#=========================================================================================================================#