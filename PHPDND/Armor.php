<?php
require_once("Item.php");

class Armor extends Item
{

  protected $armorType = '';
  protected $preFix1 = '';
  protected $preFix2 = '';
  protected $postFix1 = '';
  protected $postFix2 = '';
  protected $rarity = 0;
  protected $minDef = 0;
  protected $maxDef = 0;
  protected $specMinDef1 = 0;
  protected $psecMinDef2 = 0;
  protected $specMinDef3 = 0;
  protected $specMinDef4 = 0;
  protected $specMinDef5 = 0;
  protected $specMaxDef1 = 0;
  protected $specMaxDef2 = 0;
  protected $specMaxDef3 = 0;
  protected $specMaxDef4 = 0;
  protected $specMaxDef5 = 0;
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