<?php

require "connection.php";

$id = 1;

$medium = $_POST["m"];
$class = $_POST["c"];
$subject = $_POST["s"];
$title = $_POST["t"];
$description = $_POST["des"];

if ($medium == "0") {
    echo "Select medium";
} else if ($class == "0") {
    echo "Select class";
} else if ($subject == "0") {
    echo "Select subject";
} else if (empty($title)) {
    echo "Give lesson note title";
} else if (empty($description)) {
    echo "Give a description";
} else if (isset($_FILES["lnf"])) {
    $file = $_FILES["lnf"];

    $newFileExtension = ".pdf";

    $fileName = "lessonNotes//" . uniqid() . $newFileExtension;
    move_uploaded_file($file["tmp_name"], $fileName);

    $subjectHasClass = Database::search("SELECT * FROM `subject_has_class` WHERE `subject_id`='" . $subject . "' AND `class_id`='" . $class . "'");
    $subjectHasClassd = $subjectHasClass->fetch_assoc();
    $subjectHasClassID = $subjectHasClassd["id"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    Database::iud("INSERT INTO `lesson_notes`(`title`,`description`,`url`,`subject_has_class_id`,`teacher_id`,`dateadded`) VALUES('" . $title . "','" . $description . "','" . $fileName . "','" . $subjectHasClassID . "','" . $id . "','" . $date . "')");
    echo "Success";

} else {
    echo "Please select a file";
}
