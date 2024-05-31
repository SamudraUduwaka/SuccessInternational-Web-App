<?php

require "connection.php";

$id = 1;

$pdfs = $_POST['apdf'];

if (isset($_FILES["file"])) {
    $file = $_FILES["file"];

    $newFileExtension = ".pdf";

    $fileName = "Assignmentstomark//" . uniqid() . $newFileExtension;
    move_uploaded_file($file["tmp_name"], $fileName);

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $uploadass = Database::search("SELECT * FROM `submittedassignments` WHERE `student_id`='".$id."' AND `assignmentpdfs_id`='".$pdfs."'");
    $nuploadass = $uploadass->num_rows;

    if($nuploadass==0){
        Database::iud("INSERT INTO `submittedassignments`(`url`,`student_id`,`assignmentpdfs_id`,`dateadded`) VALUES('" . $fileName . "','" . $id . "','" . $pdfs . "','" . $date . "')");
        echo "Success";
    }else{
        Database::iud("UPDATE `submittedassignments` SET `url`='".$fileName."',`dateadded`='" . $date . "' WHERE `student_id`='" . $id . "' AND `assignmentpdfs_id`='" . $pdfs . "'");
        echo "Success";
    }

    

} else {
    echo "Please select a file";
}
