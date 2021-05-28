<?php

namespace Rpg\Class;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="village")
 * @ORM\Entity(repositoryClass="Rpg\Repository\VillageRepository")
 */
class Village
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
     * @ORM\Column(name="minLevel", type="integer", nullable=false)
     */
    protected int $minLevel;

    /**
     * @ORM\ManytoMany(targetEntity="Rpg\Class\Magasin", mappedBy="village")
     * @ORM\JoinTable("magasin_in_village")
     */
    private $magasin;

    /**
     * @ORM\ManytoMany(targetEntity="Rpg\Class\Monster", mappedBy="village")
     * @ORM\JoinTable("monsters_in_village")
     */
    private $monsters;

    public function __construct()
    {
        $this->magasin = new ArrayCollection();
        $this->monsters = new ArrayCollection();
    }

    public function getMonsters()
    {
        return $this->monsters;
    }
    
    public function getMagasin()
    {
        return $this->magasin;
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of minLevel
     */ 
    public function getMinLevel()
    {
        return $this->minLevel;
    }
}
