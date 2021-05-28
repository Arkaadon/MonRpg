<?php

namespace Rpg\Class;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Rpg\Interface\PlayableInterface;
use Rpg\Utils\Character;

/**
 * @ORM\Table(name="player", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity(repositoryClass="Rpg\Repository\PlayerRepository")
 */
class Player extends Character implements PlayableInterface
{

    /**
     * @ORM\ManytoMany(targetEntity="Rpg\Class\Item", inversedBy="players")
     * @ORM\JoinTable("player_has_items")
     */
    private $items;

    /**
     * @ORM\Column(name="gold", type="integer", nullable=false)
     */
    protected int $gold;

    /**
     * @ORM\Column(name="xp", type="integer", nullable=false)
     */
    protected int $xp;

    /**
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    protected int $level;

    public function __construct($name, $race, $classe)
    {
        parent::__construct($name, $race, $classe);
        $this->items = new ArrayCollection();
    }

    /**
     * Get the value of gold
     */ 
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set the value of gold
     *
     * @return  self
     */ 
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Get the value of xp
     */ 
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Set the value of xp
     *
     * @return  self
     */ 
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get the value of level
     */ 
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */ 
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    public function addItem(Item $item)
    {
        $this->items[] = $item;
    }

    public function removeItem(Item $item)
    {
        $this->items->removeElement($item);
    }

    public function attack($weapon, $target)
    {
        $target->hp -= 2;
        return $target;
    }

    public function move()
    {
    }

    public function defend($shield)
    {
    }

    public function throwSpell($spell)
    {
    }

    public function sePresenter()
    {
        echo "Bonjour je suis $this->name je n'ai pas encore de classe mais je peut vous dire que j'ai déjà $this->hp point de vie et pour statitiques:<br>
            - Force: $this->strength<br>
            - Agilité: $this->agility<br>
            - Intelligence $this->intel<br>
            - Endurance: $this->stamina<br>
            Mes statistiques m'orriente plutôt vers une classe de type magique à distance ou au corps à corps.<br>
            Et toi qui est tu ?";
    }

    

    
}
