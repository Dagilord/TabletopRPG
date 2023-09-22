<?php
require_once("Item.php");

class Armor extends Item
{

  protected $armorType = '';
  protected $armorTier = '';
  protected $armorWeight = '';
  protected $preFix1 = '';
  protected $preFix2 = '';
  protected $postFix1 = '';
  protected $postFix2 = '';
  protected $rarity = 0;
  protected $armorDef = 0;
  protected $specDef1 = 0;
  protected $psecDef2 = 0;
  protected $specDef3 = 0;
  protected $specDef4 = 0;
  protected $specDef5 = 0;
  protected $specDefTyp1 = '';
  protected $specDefTyp2 = '';
  protected $specDefTyp3 = '';
  protected $specDefTyp4 = '';
  protected $specDefTyp5 = '';


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

    $armName = '';
    if ($this->preFix1 !== '') {
      $armName .= $this->preFix1 . ' ';
    }
    if ($this->preFix2 !== '') {
      $armName .= $this->preFix1 . ' ';
    }
    if ($this->armorType !== '') {
      $armName .= $this->armorType;
    }

    $myDescrip = "";
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    $myDescrip .= "|" . str_pad("Armor", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($armName, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "|" . str_pad("Defense", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->armorDef, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "|" . str_pad("Tier", $lblWdth, " ", STR_PAD_RIGHT) . "|" . str_pad($this->armorTier, (40 - $lblWdth - 1), " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    for ($ix1 = 0; $ix1 < 10; $ix1++) {
      $myDescrip .= "|" . str_repeat(" ", 40) . "|\n";
    }
    $myDescrip .= "+" . str_repeat("-", 40) . "+\n";
    echo $myDescrip;
  }

  public function randomizeMe()
  {
    $rawArmTyp = explode(PHP_EOL, file_get_contents("./DATA/arm_types.txt"));
    $rawArmDef = explode(PHP_EOL, file_get_contents("./DATA/arm_defense.txt"));
    $rawArmTier = explode(PHP_EOL, file_get_contents("./DATA/arm_tiers.txt"));
    $randArm = $rawArmTyp[rand(0, sizeof($rawArmTyp) - 1)];
    $randArmDef = $rawArmDef[array_search($randArm, $rawArmTyp)];
    $randArmTier = $rawArmTier[array_search($randArm, $rawArmTyp)];
    $this->armorType = $randArm;
    $this->armorDef = $randArmDef;
    $this->armorTier = $randArmTier;

    $armName = '';
    if ($this->preFix1 !== '') {
      $armName .= $this->preFix1 . ' ';
    }
    if ($this->preFix2 !== '') {
      $armName .= $this->preFix1 . ' ';
    }
    if ($this->armorType !== '') {
      $armName .= $this->armorType;
    }
    $this->name = $armName;
  }

  public function getStat(string $stat): int
  {
    return $this->$stat;
  }
}


?>
<!-- END OF FILE -->