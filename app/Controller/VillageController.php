<?php


namespace Rpg\Controller;


use Rpg\Class\Monster;
use Rpg\Class\Player;
use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;
use Rpg\Class\Village;

require_once __DIR__ . '/../../config/bootstrap.php';

class VillageController extends AbstractController
{
    public function index()
    {
        
        // Sur cette ligne on récupére le repository correspondant au Player, pour ensuite utiliser la méthode findOneBy() de ce dernier
        $player = $this->em->getRepository(Player::class)->findOneBy(
            [
                'name' => $_GET['name']
            ]
        );
        // Sur cette ligne on récupére le repository correspondant au Monster, pour ensuite utiliser la méthode findAll() de ce dernier
        $village = $this->em->getRepository(Village::class)->find($_GET['village']);
        $monsters = $this->em->getRepository(Monster::class)->findBy(['id'=>$village->getMonsters()->getValues()]);

        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('village.html.php', [
            'header' => $header,
            'footer' => $footer,
            'player' => $player,
            'monsters' => $monsters
        ]);

    }

/**
 * Etape 1: Récupéré la liste des monstres
 * Etape 2: Afficher la liste des monstres
 * Etape 3 Crée des lien html avec l'affichage de la liste des monstres
 * Etape 4: Crée un controller "CombatController" qui aura une méthode startFight
 * Etape 5: Liée le lien html avec la méthode du Fight
 * Etape 6: Le fight affichera un combat entre le joueur et le monstre séléctionner
 */

}
