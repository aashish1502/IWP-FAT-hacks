<?php
$myfile = fopen("numbers.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
$numbers = array();
$i = 0;
while (!feof($myfile)) {
    //   echo fgets($myfile) . "<br>";
    $numbers[$i] = fgets($myfile);
    $i++;
}
$res = [];
$k = 0;
$flag = 0;
foreach ($numbers as $value) {
    // echo $value;
    $x = decbin($value);
    $length = strlen($x);
    for ($i = 0; $i < $length - 3; $i++) {
        $piece = substr($x, $i, 4);
        if ($piece == "0000") {
            $flag = 1;
        }
    }
    if ($flag == 0) {
        $res[$k] = "unlucky";
        $k++;
    } else {
        $res[$k] = "lucky";
        $k++;
    }
    $flag = 0;
}
foreach ($res as $r) {
    echo $r."<br/>";
}
fclose($myfile);
