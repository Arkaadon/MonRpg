<?php
namespace Rpg\Class;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="Rpg\Repository\ItemRepository")
 */
class Item
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
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected string $description;
    
    /**
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    protected float $price;
    
    /**
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    protected string $type;
    
    
    
    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;
        
        return $this;
    }
    
    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;
        
        return $this;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Rpg\Class\Player", mappedBy="items")
     * @ORM\JoinTable("player_has_items")
     */
    private $players;
    
    /**
     * @ORM\ManyToMany(targetEntity="Rpg\Class\Magasin", mappedBy="itemsInStock")
     * @ORM\JoinTable("magasinStock")
     */
    private $magasins;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->magasins = new ArrayCollection();
    }
    
    public function getPlayers()
    {
        return $this->players;
    }
    
    public function getMagasins()
    {
        return $this->magasins;
    }
}