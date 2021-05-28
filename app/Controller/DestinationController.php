<?php
namespace Rpg\Controller;

use Rpg\Templates\TemplateUtils;
use Rpg\Utils\AbstractController;
use Rpg\Class\Village;

require_once __DIR__ . '/../../config/bootstrap.php';

class DestinationController extends AbstractController
{
    public function destination()
    {
        
        
        $villages = $this->em->getRepository(Village::class)->findAll();
        

        $header = TemplateUtils::getHeader();
        $footer = TemplateUtils::getFooter();

        $this->render('destination.html.php', [
            'header' => $header,
            'footer' => $footer,
            'villages' => $villages
        ]);

    }

}
