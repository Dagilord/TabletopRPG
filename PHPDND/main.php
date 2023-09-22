<?php
require_once("consts.php");
require_once("PHPDND/player.php");
require_once("PHPDND/Weapon.php");
require_once("PHPDND/Armor.php");
$menu = [1 => "draw a square \n", 2 => "play 21 cards \n", 3 => "generate a random player \n", 4 => "generate a random weapon \n", 5 => "generate a random armor \n"];
$header = "please choose from the following options(enter 'q' to quit)\n" . str_repeat("=", 40) . "\n";
foreach ($menu as $key => $value) {
    $header .= $key . ") " . $value;
}
$header .= str_repeat("=", 40) . "\n";
while (true) {
    echo $header;
    $input = readline();

    // Check if the input is 'q' to quit the program
    if ($input === 'q') {
        echo "Exiting the program.\n";
        break; // Exit the loop
    } elseif ($input === '1') {
        drawsqr();
    } elseif ($input === '2') {
        play21();
    } elseif ($input === '3') {
        genRndmPlyr();
    } elseif ($input === '4') {
        genRndmWpn();
    } elseif ($input === '5') {
        genRndmArm();
    } else {
        echo FONT_BLUE . BGRND_CYAN . "invalid input: {$input}" . FULL_RESET . "\n";
        echo $header;
    }
}


function drawsqr()
{


    // Additional cleanup or final operations can be added here.
    // Ask the user to input the first integer
    echo "Please enter the square's width: ";
    $width = readline();

    // Validate if the input is a valid integer
    if (!is_numeric($width) || !ctype_digit($width)) {
        echo FONT_RED . "Invalid input. Please enter a valid integer." . FULL_RESET . "\n";
        exit(1);
    }

    // Ask the user to input the second integer
    echo "Please enter the square's height: ";
    $height = readline();

    // Validate if the input is a valid integer
    if (!is_numeric($height) || !ctype_digit($height)) {
        echo FONT_RED . "Invalid input. Please enter a valid integer." . FULL_RESET . "\n";
        exit(1);
    }

    // Convert the input strings to integers
    $width = intval($width);
    $height = intval($height);

    // Display the square
    for ($ix1 = 0; $ix1 < $height; $ix1++) {
        for ($ix2 = 0; $ix2 < $width; $ix2++) {
            if ($ix1 === 0 || $ix1 === $height - 1) {
                echo "*";
            } else {
                if ($ix2 === 0 || $ix2 === $width - 1) {
                    echo "*";
                } else {
                    echo " ";
                }
            }
        }
        echo "\n";
    }
    echo "the square has been drawn succesfully.\n";

    // You can perform operations with $integer1 and $integer2 here.
}



function play21()
{
    $Cards  = ["two" => 2, "three" => 3, "four" => 4, "five" => 5, "six" => 6, "seven" => 7, "eight" => 8, "nine" => 9, "ten" => 10, "King" => 10, "Queen" => 10, "Jack" => 10, "Ace" => 11];
    $Shapes = ["hearts", "diamonds", "clubs", "spades"];
    $Deck = [];
    $crdVal = 0;
    for ($ix1 = 0; $ix1 < sizeof($Shapes); $ix1++) {
        $kys = array_keys($Cards);
        for ($ix2 = 0; $ix2 < sizeof($kys); $ix2++) {
            $Deck[] = $kys[$ix2] . " of " . $Shapes[$ix1];
        }
    }
    shuffle($Deck);
    $jatek = true;
    while ($jatek) {
        $draw = array_pop($Deck);
        echo "you have drawn: " . $draw . "\n";
        $crdKy = explode(" of ", $draw)[0];
        if ($crdKy == "Ace" && $crdVal >= 11) {
            $crdVal += 1;
        } else {
            $crdVal += $Cards[$crdKy];
        }
        if ($crdVal === 21) {
            $jatek = false;
            echo "You won!\n";
            $jatek = false;
        } elseif ($crdVal < 21) {
            echo "the sum of you cards: " . $crdVal . "\n";
            while (true) {
                echo "please type draw to draw or q to quit.\n";
                $inp = readline();
                if ($inp === 'q') {
                    echo "Exiting the program.\n";
                    break 2; // Exit the loop
                } elseif ($inp === 'draw') {
                    break;
                } else {
                    echo "unknown input\n";
                }
            }
        } else {
            echo "the sum of your cards: " . $crdVal . "\n";
            echo "You went over 21 so you lost!\n";
            break;
        }
    }
}

function genRndmPlyr()
{
    $plyr = new Player();
    $plyr->randomizeHero();
    $plyr->showStats();
    echo "The battle begins! \n\n";
    $plyr->fightBattle();
}


function genRndmWpn()
{
    $wpn = new Weapon();
    $wpn->randomizeMe();
    $wpn->showMyDescription();
}
function genRndmArm()
{
    $arm = new Armor();
    $arm->randomizeMe();
    $arm->showMyDescription();
}


// monster + player szükséges adatok
// konkrét harc menete
// futás, skillek, itemek, mozgás, classok