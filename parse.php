<?php

//$csvData = file_get_contents('http://overlunch.com/pole/csv/new.csv');
$csvData = file_get_contents('http://overlunch.com/pole/page_us.php');
$lines = explode(PHP_EOL, $csvData);
ob_start();

foreach ($lines as $line) {
if ($line == '')
break;
    $array = array();
    echo "<tr>\n";
    $array[] = str_getcsv($line);
    foreach ($array[0] as $a) {
if ($a == 'Polestar 2')
    $watch = 1;

if ((isset($watch)) && ($a != 'Polestar 2')) {
    if (($a == '2022') || ($a == '2023'))
        echo "<td>Unspecified Motor</td>";

    unset($watch);
}
        switch ($a) {
        /*
            case "19'' 5-Double Spoke Black Diamond Cut Alloy Wheel - Summer Tire":
                $a = '19in Alloy';
                break;

            case "20'' 5-V Spoke Black Silver Alloy Wheel":
                $a = '20in Alloy';
                break;

            case "19'' 5-Double Spoke Black Diamond Cut Alloy Wheel":
                $a = '19in Alloy';
                break;
            case '20" 4-V Spoke Black Diamond Cut Alloy Wheel':
                $a = '20in Alloy';
                break;

            case '20" 4-Y Spoke Black Polished Forged Alloy Wheel - Summer Tire':
                $a = '20in Forged Alloy';
                break;

            case '19" 5-V Spoke Black Diamond Cut Alloy Wheel - Summer Tire':
                $a = '19in Alloy';
                break;
        */
            
            case '19" 5-Double Spoke Black Diamond Cut Alloy Wheel - All-Season Tires'
                $a = '19in Alloy';
                break;
                
            case '20" 5-V Spoke Black Silver Alloy Wheel - All-Season Tires';
                $a = '20in 5-V Spoke';
                break;

            case '20" 4-Multi spoke black polished forged wheel';
                $a = '20in 4-Multi Spoke';
                break;                
        }
        $a = str_replace(" with Black Ash deco", "", $a);
        $a = str_replace("Animal welfare Nappa leather in Zinc with Light ash deco", "Nappa leather Zinc", $a);
        $a = str_replace("Dual Motor", "Dual Motor", $a);
        $a = str_replace("Long range Single motor - RWD", "Long Range Single Motor", $a);
        $a = str_replace("Long range Dual motor with Performance pack", "Dual Motor (Performance)", $a);
    echo "<td>" . $a . "</td>";
    }
    echo "\n";
    echo "</tr>\n";
    unset($array);
}

$out = ob_get_contents();
ob_end_flush();

$file = "/home/overlu6/public_html/pole/csv/data.html";
$fh = fopen($file, 'w');


// check that something was actually written to the buffer
if (strlen($out) > 0) {
   fwrite($fh, $out);
} else {
   fwrite($fh, "");
}

fclose($fh);
