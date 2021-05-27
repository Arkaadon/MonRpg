<?php


namespace Rpg\Controller;

use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;
use Rpg\Class\Item;

require_once __DIR__ . '/../../config/bootstrap.php';

class MagasinController extends AbstractController
{
    public function magasin(){
        $items = $this->em->getRepository(Item::class)->findAll();


        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('magasin.html.php', [
            'header' => $header,
            'footer' => $footer,
            'items' => $items
        ]);
    }
}
