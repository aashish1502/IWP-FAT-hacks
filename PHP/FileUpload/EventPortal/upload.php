<?php

if(isset($_POST['submit'])) {

    $maxSize = 1024*1024;

    if(count($_FILES['photos']['name']) >= 3){
        $target_dir = "./fileuploads/";
        foreach ($_FILES['photos']['tmp_name'] as $key => $value) {

            $target_file = $target_dir . $_POST["Organization"]. "_" .basename($_FILES["photos"]["name"][$key]);

            $check = getimagesize($_FILES["photos"]["tmp_name"][$key]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.<br>";
                $uploadOk = 0;
            }

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["photos"]["size"][$key] > $maxSize) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "NOT UPLOADED";
            
            } else {
                if (move_uploaded_file($_FILES["photos"]["tmp_name"][$key], $target_file)) {
                    echo "The file ". basename( $_FILES["photos"]["name"][$key]). " has been uploaded.";
                } else {
                    echo "ERROR IN UPLOADING THE FILE";
                }
            }
        }
    }
    else{
        echo "Files submitted are not more than 3, fuck off! event cancelled!! - love SOC <3";
    }
}


?>