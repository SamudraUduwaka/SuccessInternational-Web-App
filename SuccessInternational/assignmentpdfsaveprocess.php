<?php

require "connection.php";

$id = 1;

$medium = $_POST["m"];
$class = $_POST["c"];
$subject = $_POST["s"];
$plag = $_POST["p"];
$title = $_POST["t"];
$deadline = $_POST["deadline"];
$description = $_POST["des"];

if ($medium == "0") {
    echo "Select medium";
} else if ($class == "0") {
    echo "Select class";
} else if ($subject == "0") {
    echo "Select subject";
} else if ($plag == "0") {
    echo "Select Plagiarism status";
} else if (empty($title)) {
    echo "Give assignment title";
} else if (empty($deadline)) {
    echo "Decide the deadline of the assignment";
} else if (empty($description)) {
    echo "Give a description";
} else if (isset($_FILES["af"])) {
    $file = $_FILES["af"];

    $newFileExtension = ".pdf";

    $fileName = "Assignments//" . uniqid() . $newFileExtension;
    move_uploaded_file($file["tmp_name"], $fileName);

    $subjectHasClass = Database::search("SELECT * FROM `subject_has_class` WHERE `subject_id`='" . $subject . "' AND `class_id`='" . $class . "'");
    $subjectHasClassd = $subjectHasClass->fetch_assoc();
    $subjectHasClassID = $subjectHasClassd["id"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    Database::iud("INSERT INTO `assignmentpdfs`(`name`,`url`,`description`,`subject_has_class_id`,`plagiarism_status_id`,`dateadded`,`deadline`,`teacher_id`) VALUES('" . $title . "','" . $fileName . "','" . $description . "','" . $subjectHasClassID . "','" . $plag . "','" . $date . "','" . $deadline . "','" . $id . "')");
    echo "Success";

} else {
    echo "Please select a file";
}
