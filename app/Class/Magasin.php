<?php
namespace Rpg\Class;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="magasin")
 * @ORM\Entity(repositoryClass="Rpg\Repository\MagasinRepository")
 */
class Magasin
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
     * @ORM\ManytoMany(targetEntity="Rpg\Class\Item", inversedBy="magasins")
     * @ORM\JoinTable("magasinStock")
     */
    private $itemsInStock;

    /**
     * @ORM\ManytoMany(targetEntity="Rpg\Class\Village", inversedBy="magasin")
     * @ORM\JoinTable("magasin_in_village")
     */
    private $village;

    public function __construct()
    {
        $this->itemsInStock = new ArrayCollection();
        $this->village = new ArrayCollection();
    }

    public function getItems()
    {
        return $this->itemsInStock;
    }

    public function getVillage()
    {
        return $this->village;
    }

    public function addItem(Item $item)
    {
        $this->itemsInStock[] = $item;
    }

    public function removeItem(Item $item)
    {
        $this->itemsInStock->removeElement($item);
    }


}