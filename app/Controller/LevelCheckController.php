<?php
namespace Rpg\Controller;

use Rpg\Class\Village;
use Rpg\Class\Player;

require_once __DIR__ . '/../../config/bootstrap.php';

class LevelCheckController
{
    public function levelCheck(){
        $entityManager = GetEntityManager();
        $village = $entityManager->getRepository(Village::class)->find($_GET['village']);
        
        $player = $entityManager->getRepository(Player::class)->findOneBy(['name' => $_GET['name']]);

        if ($player->getLevel() >= $village->getMinLevel()) {
            header("Location: index.php?p=/village&village=$_GET[village]&name=$_GET[name]");
        }
        else{
            header("Location: index.php?p=/destination&name=$_GET[name]");
            // lol
        }

    }
}
