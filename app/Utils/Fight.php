<?php
namespace Rpg\Utils;

use Rpg\Class\Monster;
use Rpg\Class\Player;

require_once __DIR__ . '/../../config/bootstrap.php';

class Fight
{
    private Player $player;
    private Monster $monster;

    public function __construct(Player $player, Monster $monster)
    {
        $this->player = $player;
        $this->monster = $monster;
    }
    
    public function start()
    {

        // Tant que le joueur et le monstre a des points de vie
        while ($this->player->getHp() > 0 && $this->monster->getHp() > 0){
            // Comme $target n'éxiste pas au début de ma boucle et afin d'éviter une "notice" je vérifie si la variable
            // existe à l'aide de la methode isset, si elle n'existe pas alors je la crée et lui donne une valeur quelconque
            if(!isset($target)){
                $target = true;
            }
            // $target sera toujours une instance de Character et de PlayableInterface, mais ne pourra
            // être qu'une instance de Monster ou Player
            if($target instanceof Monster ){
                $target = $this->monster->attack('Massue en bois', $this->player);
                echo 'Le joueur perd 2 point de vie <br>';
            }else{
                $target = $this->player->attack('Epée en bois', $this->monster);
                echo 'Le monstre perd 2 point de vie <br>';
            }
        }
        // $winner = $this->player->getHp() > 0 ? 'Le joueur gagne' : 'Le monstre gagne';
        // echo $winner;
        if ($this->player->getHp() > 0 && $this->monster->getHp() <=0){
            echo "Je joueur gagne et reçois 15 golds";
            $entityManager = GetEntityManager();
            $player = $entityManager->getRepository(Player::class)->find($this->player->getId());
            $player->setGold($player->getGold()+15);
            $player->setXp($player->getXp()+15);
            if ($player->getXp() >=100) {
                $player->setLevel($player->getLevel()+1);
                $player->setXp(0);
            };
        
            $entityManager->flush();
        }
        else {
            echo "Le monstre gagne";
        };
        echo "</br>";
        echo "<a href='index.php?p=/village&village=$_GET[village]&name=$_GET[name]' class='btn btn-primary'>Retour au village</a>";
    }

}
