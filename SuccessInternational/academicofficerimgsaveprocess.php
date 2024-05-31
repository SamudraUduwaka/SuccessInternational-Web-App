<?php

require "connection.php";

    $id = 1;

    if(isset($_FILES["i"])){

        $img = $_FILES["i"];
    
            $file_extension;
            $allowed_Image_Extention = array("image/jpg", "image/png", "image/jpeg", "image/svg");
    
            $file_extension = $img["type"];
    
            if (!in_array($file_extension, $allowed_Image_Extention)) {
                echo "Please select a valid image.";
            } else {
    
                $newImageExtension;
    
                if ($file_extension = "image/jpg") {
                    $newImageExtension = ".jpg";
                } else if ($file_extension = "image/jpeg") {
                    $newImageExtension = ".jpeg";
                } else if ($file_extension = "image/png") {
                    $newImageExtension = ".png";
                } else if ($file_extension = "image/svg") {
                    $newImageExtension = ".svg";
                }
    
                $fileName = "academicOfficerimgs//" . uniqid() . $newImageExtension;
                move_uploaded_file($img["tmp_name"], $fileName);

                $academicOfficer = Database::search("SELECT * FROM `academic_officer` WHERE `id`='".$id."'");
                $academicOfficerrs = $academicOfficer->fetch_assoc();

                $academicOfficerImageID = $academicOfficerrs["academic_officer_image_id"];

                if($academicOfficerImageID==null){
                    Database::iud("INSERT INTO `academic_officer_image`(`url`) VALUES ('" . $fileName . "')");
                    $image = Database::search("SELECT * FROM `academic_officer_image` WHERE `url`='".$fileName."'");
                    $imagers = $image->fetch_assoc();
                    Database::iud("UPDATE `academic_officer` SET `academic_officer_image_id`='".$imagers["id"]."' WHERE `id`='".$id."'");
                }else{
                    Database::iud("UPDATE `academic_officer_image` SET `url`='".$fileName."' WHERE `id`='".$academicOfficerImageID."'");
                }
    
                echo "Success";
            }
    }else{
        echo "Select an image to update";
    }
?>