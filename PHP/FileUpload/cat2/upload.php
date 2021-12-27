<?php
if (isset($_POST['submit'])) {
    $targetfolder = "upload/";
    $targetfolder = $targetfolder ."Student_mark_list";
    $ok = 1;
    $fileType = strtolower(pathinfo($targetfolder, PATHINFO_EXTENSION));
    if (isset($_POST['submit'])) {
        // Check if file already exists
        if (file_exists($targetfolder)) {
            echo "Sorry, file already exists.";
            $ok = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 1500000) {
            echo "Sorry, your file is too large.";
            $ok = 0;
        }
        // Allow certain file formats
        if ($_FILES["file"]["type"] != "text/plain") {
            echo "Sorry, only txt files are allowed.";
            $uploadOk = 0;
        }
        if ($ok == 0) {
            echo "Sorry, your files were not uploaded.";
            // if everything is ok, try to upload file
        }else{
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetfolder)) {
                echo "The document file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            }else{
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$fname="./upload/Student_mark_list";
$fp = fopen($fname,'w+') or die("error");
while (!feof($fp)) {
    $marks = fgets($fp);
    $marks = explode(",",$marks);
    $reg_no = $marks[0];
    $sub1 = (float)$marks[1] * 15/50;
    $sub2 = (float)$marks[2] * 15/50;
    $sub3 = (float)$marks[3] * 15/50;
    fputs($fp,$sub1);
    fputs($fp,$sub2);
    fputs($fp,$sub3);
    fclose($fp);
    $max1 = max($sub1,$max1);
    $max2 = max($sub2,$max2);
    $max3 = max($sub3,$max3);
    echo "Maximum of Subject1: $max1";
}
