<?php

class Creature
{
    // a class meant to represent general monsters
    protected $name = "";
    protected $race = "";
    protected $stats = ["STR" => 10, "CON" => 10, "DEX" => 10, "INT" => 10, "CHA" => 10, "WIS" => 10,];
    protected $lvl;
    protected $skills = [];
    protected $maxHp = 0;
    protected $gold = 0;
    protected $currXP = 0;
    protected const STATLBLS = ["Name", "Class", "Race", "Level", "XP", "Money"];
}
