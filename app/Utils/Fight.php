<?php
namespace Rpg\Utils;

use Rpg\Class\Monster;
use Rpg\Class\Player;

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
        $winner = $this->player->getHp() > 0 ? 'Le joueur gagne' : 'Le monstre gagne';
        echo $winner;
    }

}
