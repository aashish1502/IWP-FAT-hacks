<?php
$target_dir = "./fileuploads/";
$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["filetoupload"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "NOT FILE TYPE.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "NOT UPLOADED";

} else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["filetoupload"]["name"]). " has been uploaded.";
    } else {
        echo "ERROR IN UPLOADING THE FILE";
    }
}
?>