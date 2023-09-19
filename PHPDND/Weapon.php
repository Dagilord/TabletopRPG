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
  protected $minDmg = 0;
  protected $maxDmg = 0;
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

    $wpnName = '';
    if ($this->preFix1 !== '') {
      $wpnName .= $this->preFix1 . ' ';
    }
    if ($this->preFix2 !== '') {
      $wpnName .= $this->preFix1 . ' ';
    }

    $myDescrip = "";
    $myDescrip .= "+" . str_repeat("-", 32) . "+\n";
    $myDescrip .= "|" . str_pad($this->name, 32, " ", STR_PAD_BOTH) . "|\n";
    $myDescrip .= "+" . str_repeat("-", 32) . "+\n";
    for ($ix1 = 0; $ix1 < 10; $ix1++) {
      $myDescrip .= "|" . str_repeat(" ", 32) . "|\n";
    }
    $myDescrip .= "+" . str_repeat("-", 32) . "+\n";
    echo $myDescrip;
  }

  public function randomizeMe()
  {
    echo "Here comes an item randomization function";
  }
}


?>
<!-- END OF FILE -->