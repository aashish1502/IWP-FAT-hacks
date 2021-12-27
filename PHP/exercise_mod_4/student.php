<?php

$myfile = fopen("data.txt", "r") or die("Unable to open file!");
$cf = 0;
$count = 0;
$cage=0;
$avg=0;
$today = date("Y-m-d");
$name = array();
$number = array();
$gender = array();
$dob = array();
$gpa = array();
echo "<b>List of all students having CGPA more than 8.5 are as follows:</b> <br/>";
while (!feof($myfile)) {
    $line = fgets($myfile);
    $word = explode(",", $line);
    array_push($name,$word[0]);
    array_push($number,$word[1]);
    array_push($gender,$word[2]);
    array_push($dob,$word[3]);
    array_push($gpa,$word[4]);
    // print_r($word);
    $diff = date_diff(date_create($word[3]), date_create($today));
    $avg += $word[4];
    if((float)$word[4]>8.5)
        echo $word[0]."<br/>";
    $word[5] = $diff->format('%y');
    if ($word[2] == 'F')
        $cf++;
    if((int)$word[5]>30)
        $cage++;
    $count++;
}
echo "<b>The percentage of Female students is</b> " . ($cf / $count) * 100 . "% <br/>";
echo "<b>The number of students having age greater than 30 is</b> " . $cage . "<br/>";
echo "<b>The average GPA of all students</b> " . ($avg/$count) . "<br/>";

//File Validations
echo "<b>File Validations</b> <br/>";
foreach ($name as $value) { 
    // if(!str_starts_with($value,"\""))
    //     echo "";
    if(strlen($value)>30){
        echo $value . " is too long <br/>";
    } 
} 
foreach ($number as $value) { 
    if(strlen($value)>7){
        echo $value . " is too long (more than 7 digits) <br/>";
    } 
} 
foreach ($gender as $value) { 
    if($value != "F" && $value != "M" && $value != "f" && $value != "m")
        echo $value . " is not a valid gender <br/>";
    if(!ctype_upper($value)){
        echo $value . " is in lower case <br/>";
    } 
}
function validateDate($date, $format = 'd/m/Y'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
foreach ($dob as $value) { 
    if(!validateDate($value)){
        echo $value . " formatting is wrong<br/>";
    } 
} 
foreach ($gpa as $value) { 
    if(strlen(explode('.',(float)$value)[1])> 2){
        echo $value . " the GPA has more than two fraction digits<br/>";
    } 
} 
fclose($myfile);
