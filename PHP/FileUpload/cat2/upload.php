<?php
if (isset($_POST['submit'])) {
    $targetfolder = "upload/";
    $targetfolder = $targetfolder ."Student_mark_list.txt";
    $ok = 1;
    $fileType = strtolower(pathinfo($targetfolder, PATHINFO_EXTENSION));
    
    if (isset($_POST['submit'])) {
    
        // Check if file already exists
        if (file_exists($targetfolder)) {
            echo "Sorry, file already exists.<br>";
            $ok = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 1500000) {
            echo "Sorry, your file is too large.<br>";
            $ok = 0;
        }

        // Allow certain file formats
        if ($_FILES["file"]["type"] != "text/plain") {
            echo "Sorry, only txt files are allowed.<br>";
            $uploadOk = 0;
        }
        
        if ($ok == 0) {
            echo "Sorry, your files were not uploaded.<br>";
            // if everything is ok, try to upload file
        }
        else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfolder)) {
                echo "The document file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.<br>";
            }
            else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
}

$fname="./upload/Student_mark_list.txt";
$fp = fopen($fname,'r+') or die("error");
$markArray = array();

$max1 = 0;
$max2 = 0;
$max3 = 0;

$avg1=0;
$avg2=0;
$avg3=0;

while (!feof($fp)) {
    $marks = fgets($fp);  
    // echo "<br>" . $marks ."<br>";
  
    $marks = explode(",",$marks);
    $reg_no = $marks[0];

    $sub1 = (float)$marks[1] * 15/50;
    $sub2 = (float)$marks[2] * 15/50;
    $sub3 = (float)$marks[3] * 15/50;
    
    $avg1+=$sub1;
    $avg2+=$sub2;
    $avg3+=$sub3;

    $myArray = array($reg_no => $sub1, $sub2, $sub3);
    array_push($markArray,$myArray);  
    
    $max1 = max($sub1,$max1);
    $max2 = max($sub2,$max2);
    $max3 = max($sub3,$max3);
    
}

$avg1/= count($markArray); 
$avg2/= count($markArray); 
$avg3/= count($markArray); 

echo "<h3>Maximum of Subject 1: $max1 </h3><br>";
echo "<h3>Maximum of Subject 2: $max2 </h3><br>";
echo "<h3>Maximum of Subject 3: $max3 </h3><br>";

echo "<h3>Average of Subject 1: $avg1 </h3><br>";
echo "<h3>Average of Subject 2: $avg2 </h3><br>";
echo "<h3>Average of Subject 3: $avg3 </h3><br>";

// print_r($markArray);

fclose($fp);

$file = fopen($fname,'w+') or die("error");
foreach ($markArray as $key => $value) {

    $myStr = "";
    $lock = true;

    foreach ($value as $key => $value){
    
        if($lock){
                $myStr .= $key;
                $lock = false;
        }
    
        $myStr.=",".$value;
    }
    $myStr .= "\r";
    
    fputs($file, $myStr);
}


