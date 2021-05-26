<?php

namespace Rpg\Class;


use Doctrine\ORM\Mapping as ORM;
use Rpg\Interface\PlayableInterface;
use Rpg\Utils\Character;

/**
 * @ORM\Table(name="monster", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity(repositoryClass="Rpg\Repository\MonsterRepository")
 */
class Monster extends Character implements PlayableInterface{

    public function __construct($name, $race, $classe)
    {
        parent::__construct($name, $race, $classe);
    }

    public function sePresenter()
    {
        echo "<br><br>Bonjour je suis le monstre $this->name j'ai $this->hp point de vie et pour statitiques:<br>
            - Force: $this->strength<br>
            - Agilité: $this->agility<br>
            - Intelligence $this->intel<br>
            - Endurance: $this->stamina<br>
            Je vais t'écraser petit avorton.<br>";
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
}
