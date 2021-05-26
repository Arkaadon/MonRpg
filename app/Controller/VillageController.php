<?php


namespace Rpg\Controller;


use Rpg\Class\Monster;
use Rpg\Class\Player;
use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;

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
        $monsters = $this->em->getRepository(Monster::class)->findAll();

        echo TemplateUtils::getHeader();
        echo "
            <div class='container'>
                <h1 class='text-center'>Bienvenue dans le village !</h1>
            </div>
                <div class='card' style='width: 18rem;'>
                   
                    <div class='card-body'>
                        <h5 class='card-title'>{$player->getName()}</h5>
                        <div class='card-text'>
                            <ul>
                               <li>Race: {$player->getRace()}</li>
                               <li>Classe: {$player->getClasse()}</li>
                               <li>Point de vie: {$player->getHp()}</li>
                               <li>Force: {$player->getStrength()}</li>
                               <li>Intelligence: {$player->getIntel()}</li>
                               <li>Agilité: {$player->getAgility()}</li>
                               <li>Endurance: {$player->getStamina()}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class='container'>
            ";
        foreach ($monsters as $monster){
            echo "<a href='index.php?p=/fight&name={$player->getName()}&monster={$monster->getName()}'>{$monster->getName()}</a>";
            echo "</br>";
        }
        echo"</div>";
        echo TemplateUtils::getFooter();
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
