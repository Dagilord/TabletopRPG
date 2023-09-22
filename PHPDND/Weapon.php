<?php
require_once("Item.php");


class Weapon extends Item
{

  protected $weaponType = '';
  protected $preFix1 = '';
  protected $preFix2 = '';
  protected $postFix1 = '';
  protected $postFix2 = '';
  protected $rarity = 0;
  protected $minDmg = 1;
  protected $maxDmg = 6;
  protected $specMinDmg1 = 0;
  protected $psecMinDmg2 = 0;
  protected $specMinDmg3 = 0;
  protected $specMinDmg4 = 0;
  protected $specMinDmg5 = 0;
  protected $specMaxDmg1 = 0;
  protected $specMaxDmg2 = 0;
  protected $specMaxDmg3 = 0;
  protected $specMaxDmg4 = 0;
  protected $specMaxDmg5 = 0;
  protected $specDmgTyp1 = '';
  protected $specDmgTyp2 = '';
  protected $specDmgTyp3 = '';
  protected $specDmgTyp4 = '';
  protected $specDmgTyp5 = '';


  function __construct()
  {
    parent::__construct();
  }

  public function showMyDescription()
  {
    //<SF>
    // CREATED ON: 2023-09-19 <br>
    // CREATED BY: USERNAME$<br>
    // Convert item to string.<br>
    // PARAMETERS:
    //×-
    // @-- @param = ... -@
    //-×
    //CHANGES:
    //×-
    // @-- ... -@
    //-×
    //</SF>


    $lblWdth = 10;

    $wpnName = '';
    if ($this->preFix1 !== '') {
      $wpnName .= $this->preFix1 . ' ';
    }
    if ($this->preFix2 !== '') {
      $wpnName .= $this->preFix2 . ' ';
    }
    if ($this->weaponType !== '') {
      $wpnName .= $this->weaponType;
    }
    $myDescrip = "";
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    $myDescrip .= "|" . str_pad("Weapon", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($wpnName, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "|" . str_pad("Damage", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->maxDmg, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    for ($ix1 = 0; $ix1 < 10; $ix1++) {
      $myDescrip .= "|" . str_repeat(" ", 40) . "|\n";
    }
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    echo $myDescrip;
  }

  public function randomizeMe()
  {
    $wpnName = '';
    $rawMats = explode(PHP_EOL, file_get_contents("./DATA/materials.txt"));
    $rndMat = $rawMats[rand(0, sizeof($rawMats) - 1)];
    $this->preFix2 = $rndMat;
    $rawWpns = explode(PHP_EOL, file_get_contents("./DATA/weapons.txt"));
    $rndWpn = $rawWpns[rand(0, sizeof($rawWpns) - 1)];
    $this->weaponType = $rndWpn;
    $rawWpnDmg = explode(PHP_EOL, file_get_contents("./DATA/weapon_damage.txt"));
    $rndWpnDmg = $rawWpnDmg[array_search($rndWpn, $rawWpns)];
    $this->maxDmg = $rndWpnDmg;
    if ($this->preFix1 !== '') {
      $wpnName .= $this->preFix1 . ' ';
    }
    if ($this->preFix2 !== '') {
      $wpnName .= $this->preFix2 . ' ';
    }
    if ($this->weaponType !== '') {
      $wpnName .= $this->weaponType;
    }
    $this->name = $wpnName;
  }

  public function getDamageStats(): array
  {
    return ["minDmg" => $this->minDmg, "maxDmg" => $this->maxDmg];
  }
  public function getRndDmg(): int
  {
    return random_int($this->minDmg, $this->maxDmg);
  }
  public function getStat(string $stat)
  {
    return $this->$stat;
  }
}


?>
<!-- END OF FILE -->