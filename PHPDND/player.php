<?php
require_once('creature.php');
require_once('Weapon.php');
require_once('Armor.php');
require_once('Monster.php');
require_once('consts.php');
class Player extends Creature
{
	// A class what repersents a player object
	private $cls;
	private $equipment = [];
	protected $inventory = [];

	function __construct(string $n = "Kopcos", array $stt = [], int $lvl = 0, array $equ = [], string $cls = "Warlock", string $race = "Male Gnome", int $gold = 150000)
	{
		$this->name = $n;
		$this->cls = $cls;
		$this->race = $race;
		$this->gold = $gold;
		$this->maxHp = 10;
	}


	public function randomizeHero()
	{
		//<SF>
		// CREATED ON: 2023-09-12
		// CREATED BY: Maló$<br>
		// Fills up variables with random data.<br>
		// PARAMETERS:
		//×-
		// @-- @param = ... -@
		//-×
		//CHANGES:
		//×-
		// @-- ... -@
		//-×
		//</SF>

		//randomize stats
		foreach ($this->stats as $key => $value) {
			$this->stats[$key] = rand(5, 15);
		}

		//randomize name
		$rawnames = explode(PHP_EOL, file_get_contents("./DATA/names.txt"));
		$rndNm = $rawnames[rand(0, sizeof($rawnames) - 1)];
		$rndNm = trim(explode(".", $rndNm)[1]);
		$this->name = $rndNm;

		//randomize class
		$rawclasses = explode(PHP_EOL, file_get_contents("./DATA/classes.txt"));
		$rndCls = $rawclasses[rand(0, sizeof($rawclasses) - 1)];
		$this->cls = $rndCls;

		// randomize race
		$rndgnd = ["female", "male"];
		$rawraces = explode(PHP_EOL, file_get_contents("./DATA/races.txt"));
		$rndrace = $rawraces[rand(0, sizeof($rawraces) - 1)];
		$this->race = $rndgnd[array_rand($rndgnd, 1)] . " " . $rndrace;

		//randomize Hp
		$this->calcMod($this->stats["CON"], $this->maxHp);
		$this->currHp = $this->maxHp;

		//randomize equipment
		$arm = new Armor;
		$wep = new Weapon;
		$wep->randomizeMe();
		$arm->randomizeMe();
		$this->calcMod($this->stats["STR"], $arm->getStat("armorDef"));
		$this->calcMod($this->stats["DEX"], $wep->getStat("maxDmg"));
		$this->equipment = ["armor" => $arm, "weapon" => $wep];
	}


	public function showStats()
	{

		$myStats = "+" . str_repeat("=", 40) . "+\n";
		$lblWdth = 18;
		//Name
		$myStats .= "|" . str_pad("Name", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->name, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		//class
		$myStats .= "|" . str_pad("Class", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->cls, (40 -	$lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		//Race
		$myStats .= "|" . str_pad("Race", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->race, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		//HP
		$myStats .= "|" . str_pad("HP", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->currHp . '/' . $this->maxHp, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		$myStats .= "+" . str_repeat("=", 40) . "+\n";
		//Money
		$myStats .= "|" . str_pad("Money", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad(number_format($this->gold, 0, ".", " ") . " cp", (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		$myStats .= "|" . str_pad("Weapon", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->equipment["weapon"]->getName(), (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		$myStats .= "|" . str_pad("Armor", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->equipment["armor"]->getName(), (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		$myStats .= "+" . str_repeat("-", 40) . "+\n";
		foreach ($this->stats as $key => $value) {
			$myStats .= "|" . str_pad($key, $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($value, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		}
		$myStats .= "+" . str_repeat("-", 40) . "+\n";
		for ($ix1 = 1; $ix1 < 22; $ix1++) {
			$myStats .= "|" . str_repeat(" ", 40) . "|\n";
		}
		$myStats .= "+" . str_repeat("=", 40) . "+\n";
		echo $myStats;
	}

	public function fightBattle()
	{

		//initialization of monster
		$mon = new Monster;
		$mon->randomizeMe();
		$monHp = $mon->gethp();
		//creation of basic battle loop
		while ($monHp > 0 && $this->currHp > 0) {
			$plyrDmg = $this->equipment["weapon"]->getRndDmg();
			$monHp -= $plyrDmg;
			echo "the player has dealt " . $plyrDmg . " damage to the enemy!\n";
			echo "the monster has " . $monHp . " health left!\n";
			if ($monHp >= 1) {
				$monDmg = $mon->attack();
				$this->currHp -= $monDmg;
				echo FONT_RED . "the monster has dealt " . $monDmg . " damage to the enemy!\n";
				echo "the player has " . $this->currHp . " health left!" . FULL_RESET . "\n";
			}
		}
		if ($monHp <= 0) {
			echo "The monster has died and the player won!\n";
		} else {
			echo "The player has died and the monster won!\n";
		}
	}
}
