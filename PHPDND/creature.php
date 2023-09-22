<?php

class Creature
{
    // a class meant to represent general monsters
    protected $name = "";
    protected $race = "";
    protected $stats = ["STR" => 10, "CON" => 10, "DEX" => 10, "INT" => 10, "CHA" => 10, "WIS" => 10,];
    protected $lvl;
    protected $skills = [];
    protected $maxHp = 10;
    protected $currHp = 0;
    protected $gold = 0;
    protected $currXP = 0;
    protected const STATLBLS = ["Name", "Class", "Race", "Level", "XP", "Money"];

    protected function calcMod(int $mod, int $stat): int
    {

        // switch ($this->stats["CON"]) {
        // 	case $this:
        // 		# code...
        // 		break;

        // 	default:
        // 		# code...
        // 		break;
        // }


        $statmod = -5;

        if ($mod != 1) {
            for ($ix1 = 2; $ix1 <= $mod; $ix1++) {
                if ($ix1 % 2 === 0) {
                    $statmod++;
                    //echo "cons: " . $mod . " ix1: " . $ix1 . " hpmod: " . $statmod . "\n";
                }
            }
        }

        $stat += $statmod;






        return $statmod;
    }
}
