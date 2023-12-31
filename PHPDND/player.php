<?php
require_once('creature.php');
class Player extends Creature
{
	// A class what repersents a player object
	private $cls;
	private $equipment = [];
	private $invenrtory = [];

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

		$this->calcMaxHp();
	}


	public function showStats()
	{

		$myStats = "+" . str_repeat("=", 40) . "+\n";
		$lblWdth = 18;
		//Name
		$myStats .= "|" . str_pad("Name", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->name, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		//class
		$myStats .= "|" . str_pad("Class", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->cls, (40 -
			$lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		//Race
		$myStats .= "|" . str_pad("Race", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->race, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
		$myStats .= "+" . str_repeat("=", 40) . "+\n";
		//Money
		$myStats .= "|" . str_pad("Money", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad(number_format($this->gold, 0, ".", " ") . " cp", (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
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



	protected function calcMaxHp()
	{

		// switch ($this->stats["CON"]) {
		// 	case $this:
		// 		# code...
		// 		break;

		// 	default:
		// 		# code...
		// 		break;
		// }


		$cons = $this->stats["CON"];
		$hpmod = -5;

		if ($cons != 1) {
			for ($ix1 = 2; $ix1 <= $cons; $ix1++) {
				if ($ix1 % 2 === 0) {
					$hpmod++;
					echo "cons: " . $cons . " ix1: " . $ix1 . " hpmod: " . $hpmod . "\n";
				}
			}
		}






		$this->maxHp += $hpmod;
	}
}
