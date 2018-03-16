<?php
if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $toshiba = $_POST['toshiba'];
    $dell = $_POST['dell'];
    $mac = $_POST['mac'];
    $comtotal = $toshiba + $dell + $mac;
    echo "<fieldset>";
    echo "<legend>";
    echo "You have selected<br>";
    echo "</legend>";
//-----computer details part-----

    if (!null==($_POST['dell'])) {
        $dell = $_POST['dell'];
        $totaldell = $dell * 20000;
        echo "{$dell} Dell Computers which costs you Rs {$totaldell}<br>";
    } else {
        echo "None from Dell Brand<br>";
        $dell = 0;
        $totaldell=0;
    }

    if (!null==($_POST['mac'])) {
        $mac = $_POST['mac'];
        $totalmac = $mac * 40000;
        echo "{$mac} MAC Computers which costs you Rs {$totalmac}<br>";
    } else {
        echo "None from MAC Brand<br>";
        $mac = 0;
        $totalmac=0;
    }

    if (!null==($_POST['toshiba'])) {
        $toshiba = $_POST['toshiba'];
        $totaltoshiba = $toshiba * 30000;
        echo "{$toshiba} Toshiba Computers which costs you Rs {$totaltoshiba}<br>";
    } else {
        echo "None from Toshiba Brand<br>";
        $toshiba = 0;
        $totaltoshiba=0;
    }
    echo "</fieldset>";
//----calculation part-----
    $totalcost = $totaldell + $totalmac + $totaltoshiba;
    echo "So The Total Cost is Rs {$totalcost}";

    echo "<br>";

    $costdelivery = 0;
    if (isset($_POST['delivery'])) {
        $delivery = $_POST['delivery'];
        if ($delivery == 'home') {
            $costdelivery = 100;
            echo "Your delivery Cost is Rs {$costdelivery}<br>";
        } else $costdelivery = 0;
    }

    $totalpacking = 0;
    if (isset($_POST['packing'])) {
        $packing = $_POST['packing'];
        if ($packing == 'box') {
            $costpacking = 50;
        } elseif ($packing == 'bag') {
            $costpacking = 100;
        } else {
            $costpacking = 200;
        }
        $totalpacking = $costpacking * $comtotal;
        echo "Your Packing Cost is Rs {$totalpacking}<br>";
    }

    if (isset($_POST['location'])) {
        $location = $_POST['location'];
        if ($location ==='ktm') {
            $vat = 13;
        } else $vat = 0;
    }
        $totalprice = $totalpacking + $totalcost + $costdelivery;
        $totalvat = ($totalprice *$vat)/100;
        echo "Your vat amount is Rs {$totalvat}<br>";

    $netcost = $totalprice + $totalvat;
    echo "Your total amount to be paid is Rs {$netcost}/-";
}

