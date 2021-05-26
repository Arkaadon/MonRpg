<?php

namespace Rpg\Interface;

use Rpg\Class\Character;

interface PlayableInterface
{
    public function attack($weapon, Character $target);
    public function move();
    public function defend($shield);
    public function throwSpell($spell);
    public function sePresenter();
}
