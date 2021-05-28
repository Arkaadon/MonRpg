<?php
namespace Rpg\Controller;

use Rpg\Class\Item;
use Rpg\Class\Player;

require_once __DIR__ . '/../../config/bootstrap.php';

class AchatController
{
    public function achat(){
        $entityManager = GetEntityManager();
        $item = $entityManager->getRepository(Item::class)->find($_GET['item']);
        
        $player = $entityManager->getRepository(Player::class)->findOneBy(['name' => $_GET['name']]);

        
        $player->addItem($item);

        $entityManager->flush();

        header('Location: index.php?p=/magasin&name=' . $_GET['name']);
    }
}
