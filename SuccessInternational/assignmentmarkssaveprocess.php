<?php

require "connection.php";

$id = "1";

$class = $_POST["c"];
$medium = $_POST["m"];
$subject = $_POST["s"];
$assignment = $_POST["apdf"];
$student = $_POST["stu"];
$mark = $_POST["mark"];
$grade = $_POST["gr"];
$estatus = $_POST["es"];
$comment = $_POST["com"];

if ($medium == "0") {
    echo "Select medium";
}else if ($class == "0") {
    echo "Select class";
} else if ($subject == "0") {
    echo "Select subject";
} else if ($assignment == "0") {
    echo "Select assignment";
} else if ($student == "0") {
    echo "Select student name";
} else if (empty($mark)) {
    echo "Give the assignment mark";
} else if ($grade == "0") {
    echo "Select grade";
} else if ($estatus == "0") {
    echo "Select exam status";
} else if (empty($comment)) {
    echo "Leave a comment to the student";
} else if (isset($_FILES["i"])) {

    $img = $_FILES["i"];

    $newFileExtension = ".pdf";

    $fileName = "markedAssignments//" . uniqid() . $newFileExtension;
    move_uploaded_file($img["tmp_name"], $fileName);

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $status = "2";  //Inactive until academic officer release mark to the student
    Database::iud("INSERT INTO `student_has_assignmentmark`(`student_id`,`mark`,`comment`,`grade_id`,`exam_status_id`,`dateadded`,`teacher_id`,`status_id`,`assignmentpdfs_id`,`url`) VALUES('".$student."','".$mark."','".$comment."','".$grade."','".$estatus."','".$date."','".$id."','".$status."','".$assignment."','".$fileName."')");

    echo "Success";

} else {
    echo "Select the marked assignment";
}
