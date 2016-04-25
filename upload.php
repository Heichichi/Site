<?php
$target_dir = "uploads/";
$error_message_upload = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file exists and rename if true

if(file_exists($target_file))
{     
    $actual_name = basename($_FILES["fileToUpload"]["name"]);
    $name_no_ext = pathinfo($actual_name,PATHINFO_FILENAME);
    
    $i = 0;
    
    while (file_exists($target_file)) {
        $actual_name = (string)$name_no_ext . "_" .$i;
        $target_file = $target_dir . $actual_name.".".$imageFileType;
        $i++;
    }    
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
     $error_message_upload = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     $error_message_upload = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
elseif ($uploadOk == 0) {
     $error_message_upload = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $error_message_upload = "Sorry, there was an error uploading your file.";
    }
}
?>