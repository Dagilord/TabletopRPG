<?php
// phpinfo();
echo "ezt a szervert php futtatja";
$numb = rand(10, 20);
$numb2 = rand(10, 20);
$negyzet = test1($numb, $numb2);
?>
<!-- Ez itt egy komment -->
<form action="">
    <button>roll</button>
    <label for="rollednum">rolled number</label>
    <div style="width: 30px; height: 30px; background-color:#cdcdcd;">
        <?php
        echo $numb;
        ?>
    </div>
</form>

<p style="font-family:'Courier New', Courier, monospace;">
    <?php

    echo $negyzet;


    ?>



</p>

<?php
function test1($x, $y)
{
    echo "x= " . $x . " y= " . $y;
    $negyzet = "";
    for ($ix1 = 0; $ix1 < $y; $ix1++) {
        for ($ix2 = 0; $ix2 < $x; $ix2++) {
            if ($ix1 == 0 || $ix1 == ($y - 1)) {
                $negyzet .= "*";
            } else {
                if ($ix2 == 0 || $ix2 == ($x - 1)) {
                    $negyzet .= "*";
                } else {
                    $negyzet .= "&nbsp;";
                }
            }
        }
        $negyzet .= "<br>";
    }
    return $negyzet;
}
?>