<?php


namespace Rpg\Controller;

use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;
use Rpg\Class\Magasin;
use Rpg\Class\Village;

require_once __DIR__ . '/../../config/bootstrap.php';

class MagasinController extends AbstractController
{
    public function magasin(){
        // $items = $this->em->getRepository(Item::class)->findAll();
        $village = $this->em->getRepository(Village::class)->find($_GET['village']);
        $magasin = $this->em->getRepository(Magasin::class)->findOneBy(['id'=>$village->getMagasin()->getValues()]);

        

        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('magasin.html.php', [
            'header' => $header,
            'footer' => $footer,
            'magasin' => $magasin
        ]);
    }
}
