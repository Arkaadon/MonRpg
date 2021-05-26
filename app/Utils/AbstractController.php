<?php
namespace Rpg\Utils;
require_once __DIR__ . '/../../config/bootstrap.php';

abstract class AbstractController
{
    protected $em;
    protected $playerRepository;

    public function __construct()
    {
        $this->em = GetEntityManager();
        $this->playerRepository = $this->em->getRepository(Player::class);
    }
}