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
    
                $fileName = "studentimgs//" . uniqid() . $newImageExtension;
                move_uploaded_file($img["tmp_name"], $fileName);

                $student = Database::search("SELECT * FROM `student` WHERE `id`='".$id."'");
                $studentrs = $student->fetch_assoc();

                $studentImageID = $studentrs["student_image_id"];

                if($studentImageID==null){
                    Database::iud("INSERT INTO `student_image`(`url`) VALUES ('" . $fileName . "')");
                    $image = Database::search("SELECT * FROM `student_image` WHERE `url`='".$fileName."'");
                    $imagers = $image->fetch_assoc();
                    Database::iud("UPDATE `student` SET `student_image_id`='".$imagers["id"]."' WHERE `id`='".$id."'");
                }else{
                    Database::iud("UPDATE `student_image` SET `url`='".$fileName."' WHERE `id`='".$studentImageID."'");
                }
    
                echo "Success";
            }
    }else{
        echo "Select an image to update";
    }
?>