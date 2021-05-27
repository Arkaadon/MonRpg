<?php


namespace Rpg\Controller;

use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;
use Rpg\Class\Item;
use Rpg\Class\Magasin;

require_once __DIR__ . '/../../config/bootstrap.php';

class MagasinController extends AbstractController
{
    public function magasin(){
        // $items = $this->em->getRepository(Item::class)->findAll();
        $magasins = $this->em->getRepository(Magasin::class)->findOneBy(
            [
                'name' => 'Boutique 1'
            ]
        );


        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('magasin.html.php', [
            'header' => $header,
            'footer' => $footer,
            'magasins' => $magasins
        ]);
    }
}
