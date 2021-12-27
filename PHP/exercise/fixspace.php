<?php
$myfile = fopen("myfile.txt", "r+") or die("Unable to open file!");
// Output one character until end-of-file
$fix = "";
while (!feof($myfile)) {
    $line = fgets($myfile);
    $fixed = preg_replace('/\s+/', ' ', $line);
    $fixed = ltrim($fixed," ");
    $fix .= $fixed . "\r";
}
echo file_put_contents("myfile.txt", $fix);
fclose($myfile);
