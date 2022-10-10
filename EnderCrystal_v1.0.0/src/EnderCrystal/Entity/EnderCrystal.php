<?php

#=========================================================================================================================#

namespace EnderCrystal\Entity;

#=========================================================================================================================#

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\world\Explosion;
use pocketmine\entity\Entity;
use pocketmine\world\World;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\item\Item;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

#=========================================================================================================================#

class EnderCrystal extends Entity {

#=========================================================================================================================#

    public const TAG_SHOW_BOTTOM = "ShowBottom";
    public const NETWORK_ID = EntityIds::ENDER_CRYSTAL;

#=========================================================================================================================#

    public $height = 0.98;
    public $width = 0.98;

#=========================================================================================================================#

    public function __construct(World $world, CompoundTag $nbt){
     if(!$nbt->getNameTag(self::TAG_SHOW_BOTTOM, ByteTag::class)){
      $nbt->setByte(self::TAG_SHOW_BOTTOM, 0);
     }
     parent::__construct($world, $nbt);
     }

#=========================================================================================================================#

    public function isShowingBottom(): bool{
     return boolval($this->getNameTag->getByte(self::TAG_SHOW_BOTTOM));
    }

#=========================================================================================================================#

    public function setShowingBottom(bool $value){
     $this->getNameTag->setByte(self::TAG_SHOW_BOTTOM, intval($value));
    }

#=========================================================================================================================#

    public function setBeamTarget(Vector3 $pos){
     $this->getNameTag->setTag(new ListTag("BeamTarget", [
      new DoubleTag("", $pos->getX()),
      new DoubleTag("", $pos->getY()),
      new DoubleTag("", $pos->getZ()),
     ]));
     }

#=========================================================================================================================#

    public function attack(EntityDamageEvent $source): void{
     $pos = clone $this->getPosition();
     $this->close();
     $power = "6";
     $explode = new Explosion($pos, $power, $this);
     $explode->explodeA();
     $explode->explodeB();
    }
 }

#=========================================================================================================================#
