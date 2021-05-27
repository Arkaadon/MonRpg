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

    public function __construct()
    {
        $this->itemsInStock = new ArrayCollection();
    }

    public function getItems()
    {
        return $this->itemsInStock;
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