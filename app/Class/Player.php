<?php

namespace Rpg\Class;

use Doctrine\ORM\Mapping as ORM;
use Rpg\Interface\PlayableInterface;
use Rpg\Utils\Character;

/**
 * @ORM\Table(name="player", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity(repositoryClass="Rpg\Repository\PlayerRepository")
 */
class Player extends Character implements PlayableInterface
{

    public function __construct($name, $race, $classe)
    {
        parent::__construct($name, $race, $classe);
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
