<?php


class Item
{

  protected $id = '';
  protected $name = '';
  protected $value = 0;
  protected $weight = 0;


  function __construct()
  {
    $this->name = "ITEM NAME";
    $this->crtId();
  }




  protected function crtId()
  {
    //<SF>
    // CREATED ON: 2023-09-19 <br>
    // CREATED BY: AX07057<br>
    // Just generate a random unique ID to the item, by 5 random 4 digits hex value
    // PARAMETERS:
    //×-
    // @-- @param = ... -@
    //-×
    //CHANGES:
    //×-
    // @-- ... -@
    //-×
    //</SF>

    for ($ix1 = 0; $ix1 < 4; $ix1++) {
      $this->id .= str_pad(dechex(rand(4096, 65535)), 4, '0', STR_PAD_LEFT) . "-";
    }
    $this->id .= str_pad(dechex(rand(4096, 65535)), 4, '0', STR_PAD_LEFT);
  }

  public function showMyDescription()
  {
    //<SF>
    // CREATED ON: 2023-09-19 <br>
    // CREATED BY: AX07057<br>
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

  public function showMyId()
  {
    echo "My ID: " . $this->id . "\n";
  }

  //+---------------------------------------------------------------------+
  //|#####################################################################|
  //|__________________________PRIVATE SECTION____________________________|
  //|#####################################################################|
  //+---------------------------------------------------------------------+

}

?>

<!-- End of file -->