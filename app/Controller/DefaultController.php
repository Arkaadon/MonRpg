<?php


namespace Rpg\Controller;


use Rpg\Class\Player;
use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;

require_once __DIR__ . '/../../config/bootstrap.php';

class DefaultController extends AbstractController
{

    public function homePage()
    {
        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('index.html.php', [
            'header' => $header,
            'footer' => $footer,
        ]);
    }

    /**
     */
    public function createPerso()
    {
        // Crée notre nouveau perso
        $player = new Player($_POST['pseudo'], $_POST['race'], $_POST['classe']);


        /* La méthode persist permet d'inséré une ligne dans la base de donnée grace à Doctrine en lui donnant
           Un Objet de type @Orm/Entity correspondant */
        $this->em->persist($player);
        /* La méthode flush permet de finaliser la ou les actions de doctrine précédente
        */
        $this->em->flush();

        header('Location: index.php?p=/village&name=' . $player->getName());
    }
}
