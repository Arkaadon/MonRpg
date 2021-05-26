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
        echo TemplateUtils::getHeader();
        echo "
            <div class='container' >
                <h1 class=' text-center' >
                Mon Rpg
                </h1>
            </div>
            <div class='container' >
            <form action='index.php?p=/'  method='post' >
                <div class='mb-3' >
                    <label for=' pseudo'  class=' form-label' >Pseudo</label>
                    <input name=' pseudo'  type=' text'  class=' form-control'  id=' pseudo' >
                </div>
                <div class='mb-3' >
                    <select name='race'  class='form-select' >
                        <option value='Elfe' >Elfe</option>
                        <option value='Humain' >Humain</option>
                        <option value='Naim' >Naim</option>
                    </select>
                </div>
                <div class='mb-3' >
                    <select name='classe'  class='form-select' >
                        <option value='Guerrier' >Guerrier</option>
                        <option value='Mage' >Mage</option>
                        <option value='Archer' >Archer</option>
                    </select>
                </div>
                <button type='submit'  class=' btn btn-primary' >Commencer !</button>
            </form>
        </div>
        ";
        echo TemplateUtils::getFooter();
    }

    /**
     */
    public function createPerso(){
        // Crée notre nouveau perso
        $player = new Player($_POST['pseudo'],$_POST['race'],$_POST['classe']);

        
        /* La méthode persist permet d'inséré une ligne dans la base de donnée grace à Doctrine en lui donnant
           Un Objet de type @Orm/Entity correspondant */
        $this->em->persist($player);
        /* La méthode flush permet de finaliser la ou les actions de doctrine précédente
        */
        $this->em->flush();

        header('Location: index.php?p=/village&name='.$player->getName());
    }

}
