<?php
$en = fopen("encrypted.txt", "r") or die("Unable to open file!");
$de = fopen("decrypted.txt", "w") or die("Unable to open file!");
$encrypt = array();
$decrypt = array();
$i = 0;
while (!feof($en)) {
    $encrypt[$i] = fgets($en);
    $i++;
}

foreach ($encrypt as $value) {
    $number = '';
    for ($i = 0; $i < 7; $i++) {
        $count = 0;
        for ($j = $i; $j < 7; $j++) {
            if ((int)$value[$j] % 2 == 0) {
                $count++;
            }
        }
        $number .= $count;
    }
    array_push($decrypt, $number);
    fwrite($de, $number);
    fwrite($de,"\r");
}
print_r($decrypt);
