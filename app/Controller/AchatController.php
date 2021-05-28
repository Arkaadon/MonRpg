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

        if ($player->getGold() >= $item->getPrice()) {
            $player->setGold($player->getGold()-$item->getPrice());
            $player->addItem($item);
            $entityManager->flush();
        }


        header("Location: index.php?p=/magasin&village=$_GET[village]&name=$_GET[name]");
    }
}
