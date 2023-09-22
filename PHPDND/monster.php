<?php

class Monster extends Creature
{


    protected $monMinDmg = 1;
    protected $monMaxDmg = 0;
    protected $baseDef = 0;


    function randomizeMe()
    {

        //randomize stats
        foreach ($this->stats as $key => $value) {
            $this->stats[$key] = rand(5, 15);
        }
        $this->baseDef = random_int(7, 16);

        // randomize race
        $rawraces = explode(PHP_EOL, file_get_contents("./DATA/mon_races.txt"));
        $rndrace = $rawraces[rand(0, sizeof($rawraces) - 1)];
        $this->race = $rndrace;

        //randomize Hp
        $this->calcMod($this->stats["CON"], $this->maxHp);
        $this->currHp = $this->maxHp;

        //randomize Dmg
        $this->monMaxDmg = random_int(3, 8);
    }

    function attack(): int
    {
        return random_int($this->monMinDmg, $this->monMaxDmg);
    }
    function getHp(): int
    {
        return $this->maxHp;
    }
    function setHp(int $hp): void
    {
        $this->currHp += $hp;
    }
}
