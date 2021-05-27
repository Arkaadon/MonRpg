<?php
namespace Rpg\Class;
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
     * @ORM\Column(name="items", type="array", nullable=false)
     */
    protected array $items;
}