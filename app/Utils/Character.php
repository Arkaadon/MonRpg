<?php
namespace Rpg\Utils;

use Doctrine\ORM\Mapping as ORM;

class Character
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected int $id;

    /**
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    protected string $name;

    /**
     * @ORM\Column(name="hp", type="float", precision=10, scale=0, nullable=false)
     */
    protected float $hp;

    /**
     * @ORM\Column(name="strength", type="integer", nullable=false)
     */
    protected int $strength;

    /**
     * @ORM\Column(name="intel", type="integer", nullable=false)
     */
    protected int $intel;

    /**
     * @ORM\Column(name="agility", type="integer", nullable=false)
     */
    protected int $agility;

    /**
     * @ORM\Column(name="stamina", type="integer", nullable=false)
     */
    protected int $stamina;

    /**
     * @ORM\Column(name="race", type="string", length=50, nullable=false)
     */
    protected string $race;

    /**
     * @ORM\Column(name="classe", type="string", length=50, nullable=false)
     */
    protected string $classe;

    public function __construct($name,$race,$classe)
    {
        $this->name = $name;
        $this->race = $race;
        $this->classe = $classe;
        $this->hp = 150;
        $this->strength = 20;
        $this->intel = 20;
        $this->agility = 20;
        $this->stamina = 100;

    }

    //Permet d'accéder la propriété privé ou protected depuis l'extérieur des classes parent et enfant
    public function getName(){
        return $this->name;
    }
    //Permet de modifier la propriété privé ou protected depuis l'extérieur des classes parent et enfant
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getIntel(): int
    {
        return $this->intel;
    }

    public function getAgility(): int
    {
        return $this->agility;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function getRace(): string
    {
        return $this->race;
    }

    public function getClasse(): string
    {
        return $this->classe;
    }

}
